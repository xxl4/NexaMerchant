<?php

namespace Webkul\Admin\Http\Controllers\Sales;

<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Admin\DataGrids\Sales\OrderDataGrid;
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\DataGrids\Sales\OrderDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Sales\Repositories\OrderRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(OrderDataGrid::class)->toJson();
        }

        return view('admin::sales.orders.index');
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

<<<<<<< HEAD
        return redirect()->back();
=======
        return redirect()->route('admin.sales.orders.view', $id);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
<<<<<<< HEAD
            'customer_notified'
=======
            'customer_notified',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]), [
            'order_id'          => $id,
            'customer_notified' => request()->has('customer_notified'),
        ]);

        $comment = $this->orderCommentRepository->create($data);

        Event::dispatch('sales.order.comment.create.after', $comment);

        session()->flash('success', trans('admin::app.sales.orders.view.comment-success'));

<<<<<<< HEAD
        return redirect()->back();
=======
        return redirect()->route('admin.sales.orders.view', $id);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Result of search product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        $results = [];

<<<<<<< HEAD
        $orders = $this->orderRepository->scopeQuery(function($query) {
=======
        $orders = $this->orderRepository->scopeQuery(function ($query) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
