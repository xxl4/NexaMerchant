<?php

namespace Webkul\Admin\Http\Controllers\Reporting;

<<<<<<< HEAD
use Webkul\Admin\Helpers\Reporting;

class SaleController extends Controller
{
    /**
     * Request param functions
=======
class SaleController extends Controller
{
    /**
     * Request param functions.
     *
     * @var array
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected $typeFunctions = [
        'total-sales'         => 'getTotalSalesStats',
        'average-sales'       => 'getAverageSalesStats',
        'total-orders'        => 'getTotalOrdersStats',
        'purchase-funnel'     => 'getPurchaseFunnelStats',
        'abandoned-carts'     => 'getAbandonedCartsStats',
        'refunds'             => 'getRefundsStats',
        'tax-collected'       => 'getTaxCollectedStats',
        'shipping-collected'  => 'getShippingCollectedStats',
        'top-payment-methods' => 'getTopPaymentMethods',
    ];

    /**
<<<<<<< HEAD
     * Create a controller instance.
     * 
     * @param  \Webkul\Admin\Helpers\Reporting  $reportingHelper
     * @return void
     */
    public function __construct(protected Reporting $reportingHelper)
    {
    }

    /**
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin::reporting.sales.index')->with([
            'startDate' => $this->reportingHelper->getStartDate(),
            'endDate'   => $this->reportingHelper->getEndDate(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('admin::reporting.view')->with([
            'entity'    => 'sales',
            'startDate' => $this->reportingHelper->getStartDate(),
            'endDate'   => $this->reportingHelper->getEndDate(),
        ]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
