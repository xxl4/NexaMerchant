<?php

namespace Nicelizhi\Manage\Http\Controllers\Reporting;

use Nicelizhi\Manage\Helpers\Reporting;

class CustomerController extends Controller
{
    /**
     * Request param functions
     */
    protected $typeFunctions = [
        'total-customers'             => 'getTotalCustomersStats',
        'customers-traffic'           => 'getCustomersTrafficStats',
        'customers-with-most-sales'   => 'getCustomersWithMostSales',
        'customers-with-most-orders'  => 'getCustomersWithMostOrders',
        'customers-with-most-reviews' => 'getCustomersWithMostReviews',
        'top-customer-groups'         => 'getTopCustomerGroups',
    ];

    /**
     * Create a controller instance.
     * 
     * @param  \Nicelizhi\Manage\Helpers\Reporting  $reportingHelper
     * @return void
     */
    public function __construct(protected Reporting $reportingHelper)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin::reporting.customers.index')->with([
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
            'entity'    => 'customers',
            'startDate' => $this->reportingHelper->getStartDate(),
            'endDate'   => $this->reportingHelper->getEndDate(),
        ]);
    }
}