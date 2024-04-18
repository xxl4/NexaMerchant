<?php

namespace Nicelizhi\Manage\Http\Controllers\Sales;

use Illuminate\Http\Request;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Nicelizhi\Manage\DataGrids\Sales\OrderInvoicesDataGrid;
use Nicelizhi\Manage\DataGrids\Sales\InvoicesTransactionsDatagrid;
use Nicelizhi\Manage\Listeners\Invoice as InvoiceListener;
use Webkul\Core\Traits\PDFHandler;
use Nicelizhi\Manage\Helpers\SSP;

class InvoiceController extends Controller
{
    use PDFHandler;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected InvoiceRepository $invoiceRepository,
        protected InvoiceListener $invoiceListener
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
            $table = $table_pre.'invoices';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`t`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`t`.`order_id`',  'dt' => 'order_id', 'field'=>'order_id'),
                array( 'db' => '`t`.`state`',   'dt' => 'state', 'field'=>'state' ),
                array( 'db' => '`t`.`grand_total`',   'dt' => 'grand_total', 'field'=>'grand_total' ),
                array( 'db' => '`t`.`increment_id`',   'dt' => 'increment_id', 'field'=>'increment_id' ),
                array( 'db' => '`t`.`transaction_id`',   'dt' => 'transaction_id', 'field'=>'transaction_id' ),
                array( 'db' => '`t`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `t` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));

            //return app(OrderInvoicesDataGrid::class)->toJson();
        }

        return view('admin::sales.invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoiceTransactions($id)
    {
        return app(InvoicesTransactionsDatagrid::class)->toJson();
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

        if ($order->payment->method === 'paypal_standard') {
            abort(404);
        }

        return view('admin::sales.invoices.create', compact('order'));
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

        if (! $order->canInvoice()) {
            session()->flash('error', trans('admin::app.sales.invoices.create.creation-error'));

            return redirect()->back();
        }

        $this->validate(request(), [
            'invoice.items.*' => 'required|numeric|min:0',
        ]);

        if (! $this->invoiceRepository->haveProductToInvoice(request()->all())) {
            session()->flash('error', trans('admin::app.sales.invoices.create.product-error'));

            return redirect()->back();
        }

        if (! $this->invoiceRepository->isValidQuantity(request()->all())) {
            session()->flash('error', trans('admin::app.sales.invoices.create.invalid-qty'));

            return redirect()->back();
        }

        $this->invoiceRepository->create(array_merge(request()->all(), [
            'order_id' => $orderId,
        ]));

        session()->flash('success', trans('admin::app.sales.invoices.create.create-success'));

        return redirect()->route('admin.sales.orders.view', $orderId);
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $invoice = $this->invoiceRepository->findOrFail($id);

        return view('admin::sales.invoices.view', compact('invoice'));
    }

    /**
     * Send duplicate invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendDuplicate(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $invoice = $this->invoiceRepository->findOrFail($id);

        $invoice->email = request()->input('email');

        $this->invoiceListener->afterCreated($invoice);

        session()->flash('success', trans('admin::app.sales.invoices.view.invoice-sent'));

        return redirect()->back();
    }

    /**
     * Print and download the for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printInvoice($id)
    {
        $invoice = $this->invoiceRepository->findOrFail($id);

        return $this->downloadPDF(
            view('admin::sales.invoices.pdf', compact('invoice'))->render(),
            'invoice-' . $invoice->created_at->format('d-m-Y')
        );
    }
}
