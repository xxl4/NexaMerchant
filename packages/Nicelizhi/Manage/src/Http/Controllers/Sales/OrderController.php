<?php

namespace Nicelizhi\Manage\Http\Controllers\Sales;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Nicelizhi\Manage\DataGrids\Sales\OrderDataGrid;
use Nicelizhi\Manage\Helpers\SSP;

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
            $table = config("database.connections.mysql.prefix").'orders';
            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => 'increment_id',  'dt' => 0 ),
                array( 'db' => 'status',   'dt' => 1 )
                // array( 'db' => 'office',     'dt' => 3 ),
                // array(
                //     'db'        => 'start_date',
                //     'dt'        => 4,
                //     'formatter' => function( $d, $row ) {
                //         return date( 'jS M y', strtotime($d));
                //     }
                // ),
                // array(
                //     'db'        => 'salary',
                //     'dt'        => 5,
                //     'formatter' => function( $d, $row ) {
                //         return '$'.number_format($d);
                //     }
                // )
            );
            // SQL server connection information
            $sql_details = array(
                'user' => config("database.connections.mysql.username"),
                'pass' => config("database.connections.mysql.password"),
                'db'   => config("database.connections.mysql.database"),
                'host' => config("database.connections.mysql.host"),
                'timezone' => config("database.connections.mysql.timezone"),
                'charset' => config("database.connections.mysql.charset") // Depending on your PHP and MySQL config, you may need this
            );

            //var_dump(request()->input());exit;

            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns ));
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
