<?php

namespace Nicelizhi\Manage\Http\Controllers\Sales;

use Illuminate\Http\Request;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Nicelizhi\Manage\DataGrids\Sales\OrderTransactionsDataGrid;
use Nicelizhi\Manage\Helpers\SSP;
use Webkul\Payment\Facades\Payment;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected InvoiceRepository $invoiceRepository,
        protected ShipmentRepository $shipmentRepository,
        protected OrderTransactionRepository $orderTransactionRepository
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
            //return app(OrderTransactionsDataGrid::class)->toJson();
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'order_transactions';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`t`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`t`.`order_id`',  'dt' => 'order_id', 'field'=>'order_id'),
                array( 'db' => '`t`.`type`',   'dt' => 'type', 'field'=>'type' ),
                array( 'db' => '`t`.`amount`',   'dt' => 'amount', 'field'=>'amount' ),
                array( 'db' => '`t`.`payment_method`',   'dt' => 'payment_method', 'field'=>'payment_method' ),
                array( 'db' => '`t`.`invoice_id`',   'dt' => 'invoice_id', 'field'=>'invoice_id' ),
                array( 'db' => '`t`.`transaction_id`',   'dt' => 'transaction_id', 'field'=>'transaction_id' ),
                array( 'db' => '`t`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `t` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }

        return view('admin::sales.transactions.index');
    }

    /**
     * Display a form to save the transaction.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $payment_methods = Payment::getSupportedPaymentMethods();

        return view('admin::sales.transactions.create', compact('payment_methods'));
    }

    /**
     * Save the transaction.
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'invoice_id'     => 'required',
            'payment_method' => 'required',
            'amount'         => 'required|numeric',
        ]);

        $invoice = $this->invoiceRepository->where('increment_id', $request->invoice_id)->first();

        if (! $invoice) {
            session()->flash('error', trans('admin::app.sales.transactions.edit.invoice-missing'));

            return redirect()->back();
        }

        $transactionAmtBefore = $this->orderTransactionRepository->where('invoice_id', $invoice->id)->sum('amount');

        $transactionAmtFinal = $request->amount + $transactionAmtBefore;

        if ($invoice->state == 'paid') {
            session()->flash('info', trans('admin::app.sales.transactions.edit.already-paid'));

            return redirect(route('admin.sales.transactions.index'));
        }

        if ($transactionAmtFinal > $invoice->base_grand_total) {
            session()->flash('info', trans('admin::app.sales.transactions.edit.transaction-amount-exceeds'));

            return redirect(route('admin.sales.transactions.create'));
        }

        if ($request->amount <= 0) {
            session()->flash('info', trans('admin::app.sales.transactions.edit.transaction-amount-zero'));

            return redirect(route('admin.sales.transactions.create'));
        }

        $order = $this->orderRepository->find($invoice->order_id);

        $randomId = random_bytes(20);

        $this->orderTransactionRepository->create([
            'transaction_id' => bin2hex($randomId),
            'type'           => $request->payment_method,
            'payment_method' => $request->payment_method,
            'invoice_id'     => $invoice->id,
            'order_id'       => $invoice->order_id,
            'amount'         => $request->amount,
            'status'         => 'paid',
            'data'           => json_encode([
                'paidAmount' => $request->amount,
            ]),
        ]);

        $transactionTotal = $this->orderTransactionRepository->where('invoice_id', $invoice->id)->sum('amount');

        if ($transactionTotal >= $invoice->base_grand_total) {
            $shipments = $this->shipmentRepository->where('order_id', $invoice->order_id)->first();

            if (isset($shipments)) {
                $this->orderRepository->updateOrderStatus($order, 'completed');
            } else {
                $this->orderRepository->updateOrderStatus($order, 'processing');
            }

            $this->invoiceRepository->updateState($invoice, 'paid');
        }

        session()->flash('success', trans('admin::app.sales.transactions.edit.transaction-saved'));

        return redirect(route('admin.sales.transactions.index'));
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $transaction = $this->orderTransactionRepository->findOrFail($id);

        $transData = json_decode(json_encode(json_decode($transaction['data'])), true);

        $transactionDetailsData = $this->convertIntoSingleDimArray($transData);

        return view('admin::sales.transactions.view', compact('transaction', 'transactionDetailsData'));
    }

    /**
     * Convert transaction details data into single dim array.
     *
     * @param  array  $data
     * @return array
     */
    public function convertIntoSingleDimArray($transData)
    {
        $data = [];

        foreach ($transData as $key => $data) {
            if (is_array($data)) {
                $this->convertIntoSingleDimArray($data);
            } else {
                $skipAttributes = ['sku', 'name', 'category', 'quantity'];

                if (gettype($key) == 'integer' || in_array($key, $skipAttributes)) {
                    continue;
                }

                $data[$key] = $data;
            }
        }

        return $data;
    }
}
