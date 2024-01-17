<?php

namespace Webkul\Admin\Http\Controllers;

use Webkul\Admin\Helpers\Dashboard;

class DashboardController extends Controller
{
    /**
<<<<<<< HEAD
     * Create a controller instance.
     * 
     * @param  \Webkul\Admin\Helpers\Dashboard  $dashboardHelper
=======
     * Request param functions
     *
     * @var array
     */
    protected $typeFunctions = [
        'over-all'                 => 'getOverAllStats',
        'today'                    => 'getTodayStats',
        'stock-threshold-products' => 'getStockThresholdProducts',
        'total-sales'              => 'getSalesStats',
        'total-visitors'           => 'getVisitorStats',
        'top-selling-products'     => 'getTopSellingProducts',
        'top-customers'            => 'getTopCustomers',
    ];

    /**
     * Create a controller instance.
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(protected Dashboard $dashboardHelper)
    {
    }

    /**
     * Dashboard page.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
<<<<<<< HEAD
        if (request()->ajax()) {
            return response()->json([
                'statistics' => [
                    'sales'     => $this->dashboardHelper->getSalesStats(),
                    'visitors'  => $this->dashboardHelper->getVisitorStats(),
                    'products'  => $this->dashboardHelper->getTopProducts(),
                    'customers' => $this->dashboardHelper->getTopCustomers(),
                ],
                'startDate' => $this->dashboardHelper->getStartDate()->format('d M'),
                'endDate'   => $this->dashboardHelper->getEndDate()->format('d M'),
            ]);
        }

        return view('admin::dashboard.index')
            ->with([
                'statistics' => [
                    'over_all'        => $this->dashboardHelper->getOverAllStats(),
                    'today'           => $this->dashboardHelper->getTodayStats(),
                    'stock_threshold' => $this->dashboardHelper->getStockThresholdProducts(),
                ],
                'startDate' => $this->dashboardHelper->getStartDate(),
                'endDate'   => $this->dashboardHelper->getEndDate(),
            ]);
=======
        return view('admin::dashboard.index')->with([
            'startDate' => $this->dashboardHelper->getStartDate(),
            'endDate'   => $this->dashboardHelper->getEndDate(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function stats()
    {
        $stats = $this->dashboardHelper->{$this->typeFunctions[request()->query('type')]}();

        return response()->json([
            'statistics' => $stats,
            'date_range' => $this->dashboardHelper->getDateRange(),
        ]);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }
}
