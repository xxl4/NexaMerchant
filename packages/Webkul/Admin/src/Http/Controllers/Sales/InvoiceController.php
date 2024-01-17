<?php

namespace Webkul\Admin\Http\Controllers\Sales;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Admin\DataGrids\Sales\OrderInvoicesDataGrid;
use Webkul\Admin\DataGrids\Sales\InvoicesTransactionsDatagrid;
use Webkul\Admin\Listeners\Invoice as InvoiceListener;
use Webkul\Core\Traits\PDFHandler;
=======
use Illuminate\Support\Facades\Event;
use Webkul\Admin\DataGrids\Sales\OrderInvoicesDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Traits\PDFHandler;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

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
<<<<<<< HEAD
        protected InvoiceListener $invoiceListener
    )
    {
=======
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(OrderInvoicesDataGrid::class)->toJson();
        }

        return view('admin::sales.invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
<<<<<<< HEAD
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
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
<<<<<<< HEAD
     * Store a newly created resource in storage.
=======
     * (Store) a newly created resource in storage.
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
<<<<<<< HEAD
    public function sendDuplicate(Request $request, $id)
=======
    public function sendDuplicateEmail(Request $request, $id)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $invoice = $this->invoiceRepository->findOrFail($id);

        $invoice->email = request()->input('email');

<<<<<<< HEAD
        $this->invoiceListener->afterCreated($invoice);

        session()->flash('success', trans('admin::app.sales.invoices.view.invoice-sent'));

        return redirect()->back();
=======
        Event::dispatch('sales.invoice.send_duplicate_email', $invoice);

        session()->flash('success', trans('admin::app.sales.invoices.view.invoice-sent'));

        return redirect()->route('admin.sales.invoices.view', $invoice->id);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
