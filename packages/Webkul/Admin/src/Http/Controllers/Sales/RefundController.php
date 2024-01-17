<?php

namespace Webkul\Admin\Http\Controllers\Sales;

<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\RefundRepository;
use Webkul\Admin\DataGrids\Sales\OrderRefundDataGrid;
=======
use Webkul\Admin\DataGrids\Sales\OrderRefundDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\RefundRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class RefundController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderItemRepository $orderItemRepository,
        protected RefundRepository $refundRepository
<<<<<<< HEAD
    )
    {
=======
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Display a listing of the resource.
     *
<<<<<<< HEAD
     * @return \Illuminate\Http\View
=======
     * @return \Illuminate\View\View
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(OrderRefundDataGrid::class)->toJson();
        }

        return view('admin::sales.refunds.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $orderId
<<<<<<< HEAD
     * @return \Illuminate\Http\View
=======
     * @return \Illuminate\View\View
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function create($orderId)
    {
        $order = $this->orderRepository->findOrFail($orderId);

        return view('admin::sales.refunds.create', compact('order'));
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

        if (! $order->canRefund()) {
            session()->flash('error', trans('admin::app.sales.refunds.create.creation-error'));

            return redirect()->back();
        }

        $this->validate(request(), [
            'refund.items.*' => 'required|numeric|min:0',
        ]);

        $data = request()->all();

<<<<<<< HEAD
        if (! $data['refund']['shipping']) {
=======
        if (! isset($data['refund']['shipping'])) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            $data['refund']['shipping'] = 0;
        }

        $totals = $this->refundRepository->getOrderItemsRefundSummary($data['refund']['items'], $orderId);

        if (! $totals) {
            session()->flash('error', trans('admin::app.sales.refunds.create.invalid-qty'));

            return redirect()->back();
        }

        $maxRefundAmount = $totals['grand_total']['price'] - $order->refunds()->sum('base_adjustment_refund');

        $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $data['refund']['shipping'] + $data['refund']['adjustment_refund'] - $data['refund']['adjustment_fee'];

        if (! $refundAmount) {
            session()->flash('error', trans('admin::app.sales.refunds.create.invalid-refund-amount-error'));

            return redirect()->back();
        }

        if ($refundAmount > $maxRefundAmount) {
            session()->flash('error', trans('admin::app.sales.refunds.create.refund-limit-error', ['amount' => core()->formatBasePrice($maxRefundAmount)]));

            return redirect()->back();
        }

        $this->refundRepository->create(array_merge($data, ['order_id' => $orderId]));

        session()->flash('success', trans('admin::app.sales.refunds.create.create-success'));

        return redirect()->route('admin.sales.refunds.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $orderId
<<<<<<< HEAD
     * @return \Illuminate\Http\JsonResponse
=======
     * @return \Illuminate\Http\JsonResponse|mixed
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function updateQty($orderId)
    {
        $data = $this->refundRepository->getOrderItemsRefundSummary(request()->input(), $orderId);

        if (! $data) {
            return response('');
        }

        return response()->json($data);
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
<<<<<<< HEAD
     * @return \Illuminate\Http\View
=======
     * @return \Illuminate\View\View
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function view($id)
    {
        $refund = $this->refundRepository->findOrFail($id);

        return view('admin::sales.refunds.view', compact('refund'));
    }
}
