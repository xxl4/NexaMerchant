<?php

namespace Nicelizhi\Manage\Http\Controllers\Sales;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Nicelizhi\Manage\DataGrids\Sales\OrderDataGrid;
use Nicelizhi\Manage\Helpers\SSP;
use Illuminate\Support\Facades\Artisan;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderCommentRepository $orderCommentRepository
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
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'orders';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`o`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`o`.`increment_id`',  'dt' => 'increment_id', 'field'=>'increment_id'),
                array( 'db' => '`o`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`o`.`customer_email`',   'dt' => 'customer_email', 'field'=>'customer_email' ),
                array( 'db' => '`o`.`customer_first_name`',   'dt' => 'customer_first_name', 'field'=>'customer_first_name' ),
                array( 'db' => '`o`.`customer_last_name`',   'dt' => 'customer_last_name', 'field'=>'customer_last_name' ),
                array( 'db' => '`o`.`order_currency_code`',   'dt' => 'order_currency_code', 'field'=>'order_currency_code' ),
                array( 'db' => '`o`.`grand_total`',   'dt' => 'grand_total', 'field'=>'grand_total' ),
                array( 'db' => '`o`.`base_grand_total`',  'dt' => 'base_grand_total', 'field'=>'base_grand_total', 'formatter' => function($d, $row) {
                    return core()->currency($d);
                }),
                array( 'db' => '`t`.`captures_id`',   'dt' => 'captures_id', 'field'=>'captures_id' ),
                array( 'db' => '`t`.`transaction_id`',   'dt' => 'transaction_id', 'field'=>'transaction_id' ),
                array( 'db' => '`p`.`method_title`',   'dt' => 'method_title', 'field'=>'method_title' ),
                array( 'db' => '`p`.`method`',   'dt' => 'method', 'field'=>'method' ),
                array( 'db' => '`o`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
                array( 'db' => '`o`.`shipping_method`',   'dt' => 'shipping_method', 'field'=>'shipping_method' ),
                array( 'db' => '`s`.`track_number`',   'dt' => 'track_number', 'field'=>'track_number' ),
                array( 'db' => '`o`.`id`',   'dt' => 'oid', 'field'=>'id' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `o` LEFT JOIN `{$table_pre}order_transactions` AS t ON (`t`.`order_id` = `o`.`id`) LEFT JOIN `{$table_pre}order_payment` AS p ON (`p`.`order_id` = `o`.`id`) LEFT JOIN `{$table_pre}shipments` AS s on (`s`.`order_id` = `o`.`id`) ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }

        return view('admin::sales.orders.index');
    }

    // dup orders
    public function duplicate() {
        if (request()->ajax()) {
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'orders';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`o`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`o`.`increment_id`',  'dt' => 'increment_id', 'field'=>'increment_id'),
                array( 'db' => '`o`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`o`.`customer_email`',   'dt' => 'customer_email', 'field'=>'customer_email' ),
                array( 'db' => '`o`.`customer_first_name`',   'dt' => 'customer_first_name', 'field'=>'customer_first_name' ),
                array( 'db' => '`o`.`customer_last_name`',   'dt' => 'customer_last_name', 'field'=>'customer_last_name' ),
                array( 'db' => '`o`.`base_grand_total`',  'dt' => 'base_grand_total', 'field'=>'base_grand_total', 'formatter' => function($d, $row) {
                    return core()->currency($d);
                }),
                array( 'db' => '`t`.`transaction_id`',   'dt' => 'transaction_id', 'field'=>'transaction_id' ),
                array( 'db' => '`p`.`method`',   'dt' => 'method', 'field'=>'method' ),
                array( 'db' => '`o`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
                array( 'db' => '`o`.`shipping_method`',   'dt' => 'shipping_method', 'field'=>'shipping_method' ),
                array( 'db' => '`s`.`track_number`',   'dt' => 'track_number', 'field'=>'track_number' ),
                array( 'db' => '`o`.`id`',   'dt' => 'oid', 'field'=>'id' ),
                array( 'db' => 'count(`o`.`id`) as count',   'dt' => 'count', 'field'=>'count' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = " FROM `{$table}` AS `o` LEFT JOIN `{$table_pre}order_transactions` AS t ON (`t`.`order_id` = `o`.`id`) LEFT JOIN `{$table_pre}order_payment` AS p ON (`p`.`order_id` = `o`.`id`) LEFT JOIN `{$table_pre}shipments` AS s on (`s`.`order_id` = `o`.`id`) where `o`.status='processing' group by `o`.customer_email having count>1 ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }
        return view('admin::sales.orders.duplicate');
    }

    public function unpost() {
        if (request()->ajax()) {
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'orders';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`o`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`o`.`increment_id`',  'dt' => 'increment_id', 'field'=>'increment_id'),
                array( 'db' => '`o`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`o`.`customer_email`',   'dt' => 'customer_email', 'field'=>'customer_email' ),
                array( 'db' => '`o`.`customer_first_name`',   'dt' => 'customer_first_name', 'field'=>'customer_first_name' ),
                array( 'db' => '`o`.`customer_last_name`',   'dt' => 'customer_last_name', 'field'=>'customer_last_name' ),
                array( 'db' => '`o`.`base_grand_total`',  'dt' => 'base_grand_total', 'field'=>'base_grand_total', 'formatter' => function($d, $row) {
                    return core()->currency($d);
                }),
                array( 'db' => '`o`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
                array( 'db' => '`o`.`shipping_method`',   'dt' => 'shipping_method', 'field'=>'shipping_method' ),
                array( 'db' => '`o`.`id`',   'dt' => 'oid', 'field'=>'id' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = " FROM `{$table}` AS `o` LEFT join ba_shopify_orders as so on o.id=so.order_id WHERE o.status in('processing','completed') and so.order_id is null  ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }
        return view('admin::sales.orders.unpost');
    }

    public function abnormal() {
        if (request()->ajax()) {
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'orders';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`o`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`o`.`increment_id`',  'dt' => 'increment_id', 'field'=>'increment_id'),
                array( 'db' => '`o`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`o`.`customer_email`',   'dt' => 'customer_email', 'field'=>'customer_email' ),
                array( 'db' => '`o`.`customer_first_name`',   'dt' => 'customer_first_name', 'field'=>'customer_first_name' ),
                array( 'db' => '`o`.`customer_last_name`',   'dt' => 'customer_last_name', 'field'=>'customer_last_name' ),
                array( 'db' => '`o`.`base_grand_total`',  'dt' => 'base_grand_total', 'field'=>'base_grand_total', 'formatter' => function($d, $row) {
                    return core()->currency($d);
                }),
                array( 'db' => '`t`.`transaction_id`',   'dt' => 'transaction_id', 'field'=>'transaction_id' ),
                array( 'db' => '`p`.`method`',   'dt' => 'method', 'field'=>'method' ),
                array( 'db' => '`o`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
                array( 'db' => '`o`.`shipping_method`',   'dt' => 'shipping_method', 'field'=>'shipping_method' ),
                array( 'db' => '`s`.`track_number`',   'dt' => 'track_number', 'field'=>'track_number' ),
                array( 'db' => '`o`.`id`',   'dt' => 'oid', 'field'=>'id' ),
                array( 'db' => '`p`.`additional`',   'dt' => 'additional', 'field'=>'additional' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = " FROM `{$table}` AS `o` LEFT JOIN `{$table_pre}addresses` AS `a` ON (`a`.`order_id` = `o`.`id` AND `a`.`address_type`='cart_shipping') LEFT JOIN `{$table_pre}order_transactions` AS t ON (`t`.`order_id` = `o`.`id`) LEFT JOIN `{$table_pre}order_payment` AS p ON (`p`.`order_id` = `o`.`id`) LEFT JOIN `{$table_pre}shipments` AS s on (`s`.`order_id` = `o`.`id`) WHERE o.status='pending' and o.id !=o.increment_id and p.method='paypal_smart_button'  ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }
        return view('admin::sales.orders.abnormal');
    }

    /**
     * 
     * confirm payment
     * @param int $id
     * 
     */
    public function confirmpayment($id){
        $order = $this->orderRepository->findOrFail($id);

        $status = ['closed', 'pending','completed'];
        
        if(!in_array($order->status, $status)) exit(1);

        //edit the order to processing

        $this->orderRepository->updateOrderStatus($order, "processing");

        //add data to post to shopify

        // send order to shopify
        Artisan::queue("shopify:order:post", ['--order_id'=> $order->id])->onConnection('redis')->onQueue('commands');

        return redirect()->route('admin.sales.orders.abnormal');

    }

    public function repush($id) {
        $order = $this->orderRepository->findOrFail($id);
        
        if($order->status!='processing') exit(1);

        Artisan::queue("shopify:order:post", ['--order_id'=> $order->id])->onConnection('redis')->onQueue('commands');

        return redirect()->route('admin.sales.orders.unpost');
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $order = $this->orderRepository->findOrFail($id);

        return view('admin::sales.orders.view', compact('order'));
    }

    /**
     * Cancel action for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $result = $this->orderRepository->cancel($id);

        if ($result) {
            session()->flash('success', trans('admin::app.sales.orders.view.cancel-success'));
        } else {
            session()->flash('error', trans('admin::app.sales.orders.view.create-error'));
        }

        return redirect()->back();
    }

    /**
     * Add comment to the order
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment($id)
    {
        Event::dispatch('sales.order.comment.create.before');

        $data = array_merge(request()->only([
            'comment',
            'customer_notified'
        ]), [
            'order_id'          => $id,
            'customer_notified' => request()->has('customer_notified'),
        ]);

        $comment = $this->orderCommentRepository->create($data);

        Event::dispatch('sales.order.comment.create.after', $comment);

        session()->flash('success', trans('admin::app.sales.orders.view.comment-success'));

        return redirect()->back();
    }

    /**
     * Result of search product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        $results = [];

        $orders = $this->orderRepository->scopeQuery(function($query) {
            return $query->where('customer_email', 'like', '%' . urldecode(request()->input('query')) . '%')
                ->orWhere('status', 'like', '%' . urldecode(request()->input('query')) . '%')
                ->orWhere(DB::raw('CONCAT(' . DB::getTablePrefix() . 'customer_first_name, " ", ' . DB::getTablePrefix() . 'customer_last_name)'), 'like', '%' . urldecode(request()->input('query')) . '%')
                ->orWhere('increment_id', request()->input('query'))
                ->orderBy('created_at', 'desc');
        })->paginate(10);

        foreach ($orders as $key => $order) {
            $orders[$key]['formatted_created_at'] = core()->formatDate($order->created_at, 'd M Y');

            $orders[$key]['status_label'] = $order->status_label;

            $orders[$key]['customer_full_name'] = $order->customer_full_name;
        }

        return response()->json($orders);
    }
}
