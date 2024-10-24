<?php

namespace Nicelizhi\Manage\Http\Controllers\Sales;

use Nicelizhi\Manage\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Nicelizhi\Manage\DataGrids\Sales\OrderShipmentsDataGrid;
use Nicelizhi\Manage\Helpers\SSP;

class ShipmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderItemRepository $orderItemRepository,
        protected ShipmentRepository $shipmentRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            //return app(OrderShipmentsDataGrid::class)->toJson();

            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'shipments';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`t`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`t`.`order_id`',  'dt' => 'order_id', 'field'=>'order_id'),
                array( 'db' => '`t`.`total_qty`',  'dt' => 'total_qty', 'field'=>'total_qty'),
                array( 'db' => '`t`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`t`.`carrier_code`',   'dt' => 'carrier_code', 'field'=>'carrier_code' ),
                array( 'db' => '`t`.`carrier_title`',   'dt' => 'carrier_title', 'field'=>'carrier_title' ),
                array( 'db' => '`t`.`track_number`',   'dt' => 'track_number', 'field'=>'track_number' ),
                array( 'db' => '`t`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `t` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }

        return view('admin::sales.shipments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $orderId
     * @return \Illuminate\View\View
     */
    public function create($orderId)
    {
        $order = $this->orderRepository->findOrFail($orderId);

        if (!$order->channel || !$order->canShip()) {
            session()->flash('error', trans('admin::app.sales.shipments.create.creation-error'));

            return redirect()->back();
        }

        return view('admin::sales.shipments.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function store($orderId)
    {
        $order = $this->orderRepository->findOrFail($orderId);

        if (!$order->canShip()) {
            session()->flash('error', trans('admin::app.sales.shipments.create.order-error'));

            return redirect()->back();
        }

        $this->validate(request(), [
            'shipment.source'    => 'required',
            'shipment.items.*.*' => 'required|numeric|min:0',
        ]);

        $data = request()->only(['shipment', 'carrier_name']);

        if (!$this->isInventoryValidate($data)) {
            session()->flash('error', trans('admin::app.sales.shipments.create.quantity-invalid'));

            return redirect()->back();
        }

        $this->shipmentRepository->create(array_merge($data, [
            'order_id' => $orderId,
        ]));

        session()->flash('success', trans('admin::app.sales.shipments.create.success'));

        return redirect()->route('admin.sales.orders.view', $orderId);
    }

    /**
     * Checks if requested quantity available or not.
     *
     * @param  array  $data
     * @return bool
     */
    public function isInventoryValidate(&$data)
    {
        if (!isset($data['shipment']['items'])) {
            return;
        }

        $valid = false;

        $inventorySourceId = $data['shipment']['source'];

        foreach ($data['shipment']['items'] as $itemId => $inventorySource) {
            $qty = $inventorySource[$inventorySourceId];

            if ((int) $qty) {
                $orderItem = $this->orderItemRepository->find($itemId);

                if ($orderItem->qty_to_ship < $qty) {
                    return false;
                }

                if ($orderItem->getTypeInstance()->isComposite()) {
                    foreach ($orderItem->children as $child) {
                        if (!$child->qty_ordered) {
                            continue;
                        }

                        $finalQty = ($child->qty_ordered / $orderItem->qty_ordered) * $qty;

                        $availableQty = $child->product->inventories()
                            ->where('inventory_source_id', $inventorySourceId)
                            ->sum('qty');

                        if (
                            $child->qty_to_ship < $finalQty
                            || $availableQty < $finalQty
                        ) {
                            return false;
                        }
                    }
                } else {
                    $availableQty = $orderItem->product->inventories()
                        ->where('inventory_source_id', $inventorySourceId)
                        ->sum('qty');

                    if (
                        $orderItem->qty_to_ship < $qty
                        || $availableQty < $qty
                    ) {
                        return false;
                    }
                }

                $valid = true;
            } else {
                unset($data['shipment']['items'][$itemId]);
            }
        }

        return $valid;
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $shipment = $this->shipmentRepository->findOrFail($id);

        return view('admin::sales.shipments.view', compact('shipment'));
    }
}
