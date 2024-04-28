<?php

namespace Nicelizhi\Manage\Http\Controllers\Reporting;

use Nicelizhi\Manage\Helpers\Reporting;

class ProductController extends Controller
{
    /**
     * Request param functions
     */
    protected $typeFunctions = [
        'total-sold-quantities'            => 'getTotalSoldQuantitiesStats',
        'total-products-added-to-wishlist' => 'getTotalProductsAddedToWishlistStats',
        'top-selling-products-by-revenue'  => 'getTopSellingProductsByRevenue',
        'top-selling-products-by-quantity' => 'getTopSellingProductsByQuantity',
        'products-with-most-reviews'       => 'getProductsWithMostReviews',
        'products-with-most-visits'        => 'getProductsWithMostVisits',
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
        return view('admin::reporting.products.index')->with([
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
            'entity'    => 'products',
            'startDate' => $this->reportingHelper->getStartDate(),
            'endDate'   => $this->reportingHelper->getEndDate(),
        ]);
    }
}