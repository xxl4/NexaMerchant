<?php

namespace Webkul\Admin\Helpers\Reporting;

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Customer\Repositories\WishlistRepository;
=======
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Marketing\Repositories\SearchTermRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Product\Repositories\ProductRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\Sales\Repositories\OrderItemRepository;

class Product extends AbstractReporting
{
    /**
     * Create a helper instance.
<<<<<<< HEAD
     * 
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @param  \Webkul\Product\Repositories\ProductInventoryRepository  $productInventoryRepository
     * @param  \Webkul\Customer\Repositories\WishlistRepository  $wishlistRepository
     * @param  \Webkul\Product\Repositories\ProductReviewRepository  $reviewRepository
     * @param  \Webkul\Sales\Repositories\OrderItemRepository  $orderItemRepository
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductInventoryRepository $productInventoryRepository,
        protected WishlistRepository $wishlistRepository,
        protected ProductReviewRepository $reviewRepository,
        protected OrderItemRepository $orderItemRepository,
<<<<<<< HEAD
    )
    {
=======
        protected SearchTermRepository $searchTermRepository
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        parent::__construct();
    }

    /**
     * Retrieves total sold quantities and their progress.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return array
     */
    public function getTotalSoldQuantitiesProgress()
    {
        return [
            'previous' => $previous = $this->getTotalSoldQuantities($this->lastStartDate, $this->lastEndDate),
            'current'  => $current = $this->getTotalSoldQuantities($this->startDate, $this->endDate),
            'progress' => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Returns previous sold quantities over time
<<<<<<< HEAD
     * 
     * @param  string  $period
     * @param  bool  $includeEmpty
     * @return array
=======
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousTotalSoldQuantitiesOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalSoldQuantitiesOverTime($this->lastStartDate, $this->lastEndDate, $period);
    }

    /**
     * Returns current sold quantities over time
<<<<<<< HEAD
     * 
     * @param  string  $period
     * @param  bool  $includeEmpty
     * @return array
=======
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentTotalSoldQuantitiesOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalSoldQuantitiesOverTime($this->startDate, $this->endDate, $period);
    }

    /**
     * Retrieves total sold quantities.
<<<<<<< HEAD
     * 
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return int
=======
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalSoldQuantities($startDate, $endDate): int
    {
        return $this->orderItemRepository
<<<<<<< HEAD
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('qty_ordered');
=======
            ->resetModel()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->value(DB::raw('SUM(qty_invoiced - qty_refunded)')) ?? 0;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Retrieves total products added to wishlist and their progress.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return array
     */
    public function getTotalProductsAddedToWishlistProgress()
    {
        return [
            'previous' => $previous = $this->getTotalProductsAddedToWishlist($this->lastStartDate, $this->lastEndDate),
            'current'  => $current = $this->getTotalProductsAddedToWishlist($this->startDate, $this->endDate),
            'progress' => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Returns previous products added to wishlist over time
<<<<<<< HEAD
     * 
     * @param  string  $period
     * @param  bool  $includeEmpty
     * @return array
=======
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousTotalProductsAddedToWishlistOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalProductsAddedToWishlistOverTime($this->lastStartDate, $this->lastEndDate, $period);
    }

    /**
     * Returns current products added to wishlist over time
<<<<<<< HEAD
     * 
     * @param  string  $period
     * @param  bool  $includeEmpty
     * @return array
=======
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentTotalProductsAddedToWishlistOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalProductsAddedToWishlistOverTime($this->startDate, $this->endDate, $period);
    }

    /**
     * Retrieves total products added to wishlist.
<<<<<<< HEAD
     * 
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return int
=======
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalProductsAddedToWishlist($startDate, $endDate): int
    {
        return $this->wishlistRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
    }

    /**
     * Retrieves total reviews and their progress.
<<<<<<< HEAD
     * 
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalReviewsProgress(): array
    {
        return [
            'previous' => $previous = $this->getTotalReviews($this->lastStartDate, $this->lastEndDate),
            'current'  => $current = $this->getTotalReviews($this->startDate, $this->endDate),
<<<<<<< HEAD
            'progress' => $this->getPercentageChange($previous, $current)
=======
            'progress' => $this->getPercentageChange($previous, $current),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ];
    }

    /**
     * Retrieves total reviews by date
<<<<<<< HEAD
     * 
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return integer
=======
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalReviews($startDate, $endDate): int
    {
        return $this->reviewRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->where('status', 'approved')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
    }

    /**
     * Gets stock threshold.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getStockThresholdProducts($limit = null): Collection
    {
        return $this->productInventoryRepository
            ->with('product', 'product.attribute_family', 'product.attribute_values', 'product.images')
=======
     *
     * @param  int  $limit
     */
    public function getStockThresholdProducts($limit = null): EloquentCollection
    {
        return $this->productInventoryRepository
            ->resetModel()
            ->with(['product', 'product.attribute_family', 'product.attribute_values', 'product.images'])
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->select('*', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('product_id')
            ->orderBy('total_qty', 'ASC')
            ->limit($limit)
            ->get();
    }

    /**
     * Gets top-selling products by revenue.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTopSellingProductsByRevenue($limit = null): collection
    {
        $products = $this->orderItemRepository
            ->with(['product', 'product.images'])
            ->addSelect('*', DB::raw('SUM(base_total_invoiced - base_discount_refunded) as revenue'))
            ->whereNull('parent_id')
            ->whereBetween('order_items.created_at', [$this->startDate, $this->endDate])
=======
     *
     * @param  int  $limit
     */
    public function getTopSellingProductsByRevenue($limit = null): Collection
    {
        $items = $this->orderItemRepository
            ->resetModel()
            ->with(['product', 'product.attribute_family', 'product.attribute_values', 'product.images'])
            ->addSelect('*', DB::raw('SUM(base_total_invoiced - base_amount_refunded) as revenue'))
            ->whereNull('parent_id')
            ->whereBetween('order_items.created_at', [$this->startDate, $this->endDate])
            ->having(DB::raw('SUM(base_total_invoiced - base_amount_refunded)'), '>', 0)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->groupBy('product_id')
            ->orderBy('revenue', 'DESC')
            ->limit($limit)
            ->get();
<<<<<<< HEAD
        

        $products->map(function($product) {
            $product->formatted_revenue = core()->formatBasePrice($product->revenue);

            $product->formatted_price = core()->formatBasePrice($product->price);
        });

        return $products;
=======

        $items = $items->map(function ($item) {
            return [
                'id'                => $item->product_id,
                'name'              => $item->name,
                'price'             => $item->product?->price,
                'formatted_price'   => core()->formatBasePrice($item->price),
                'revenue'           => $item->revenue,
                'formatted_revenue' => core()->formatBasePrice($item->revenue),
                'images'            => $item->product?->images,
            ];
        });

        return $items;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Gets top-selling products by quantity.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTopSellingProductsByQuantity($limit = null): collection
    {
        $products = $this->orderItemRepository
            ->with(['product', 'product.images'])
            ->addSelect('*', DB::raw('SUM(qty_ordered) as total_qty_ordered'))
            ->whereNull('parent_id')
            ->whereBetween('order_items.created_at', [$this->startDate, $this->endDate])
=======
     *
     * @param  int  $limit
     */
    public function getTopSellingProductsByQuantity($limit = null): Collection
    {
        $items = $this->orderItemRepository
            ->resetModel()
            ->with(['product', 'product.attribute_family', 'product.attribute_values', 'product.images'])
            ->addSelect('*', DB::raw('SUM(qty_invoiced - qty_refunded) as total_qty_ordered'))
            ->whereNull('parent_id')
            ->whereBetween('order_items.created_at', [$this->startDate, $this->endDate])
            ->having(DB::raw('SUM(qty_invoiced - qty_refunded)'), '>', 0)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->groupBy('product_id')
            ->orderBy('total_qty_ordered', 'DESC')
            ->limit($limit)
            ->get();

<<<<<<< HEAD
        return $products;
=======
        $items = $items->map(function ($item) {
            return [
                'id'                => $item->product_id,
                'name'              => $item->name,
                'price'             => $item->product?->price,
                'formatted_price'   => core()->formatBasePrice($item->price),
                'total_qty_ordered' => $item->total_qty_ordered,
                'images'            => $item->product?->images,
            ];
        });

        return $items;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Gets products with most orders.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProductsWithMostReviews($limit = null): Collection
=======
     *
     * @param  int  $limit
     */
    public function getProductsWithMostReviews($limit = null): EloquentCollection
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        $tablePrefix = DB::getTablePrefix();

        $products = $this->reviewRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->addSelect(
                'product_id',
                DB::raw('COUNT(*) as reviews')
            )
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->where('status', 'approved')
            ->groupBy('product_id')
            ->orderByDesc('reviews')
            ->limit($limit)
            ->get();

        $products->map(function ($product) {
            $product->product_name = $product->product->name;
        });

        return $products;
    }

    /**
<<<<<<< HEAD
     * Returns sold quantities over time
     * 
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @return array
=======
     * Gets last search terms
     *
     * @param  int  $limit
     */
    public function getLastSearchTerms($limit = null): EloquentCollection
    {
        return $this->searchTermRepository
            ->resetModel()
            ->whereBetween('updated_at', [$this->startDate, $this->endDate])
            ->orderByDesc('updated_at')
            ->limit($limit)
            ->get();
    }

    /**
     * Gets top search terms
     *
     * @param  int  $limit
     */
    public function getTopSearchTerms($limit = null): EloquentCollection
    {
        return $this->searchTermRepository
            ->resetModel()
            ->orderByDesc('uses')
            ->limit($limit)
            ->get();
    }

    /**
     * Returns sold quantities over time
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalSoldQuantitiesOverTime($startDate, $endDate, $period = 'auto'): array
    {
        $config = $this->getTimeInterval($startDate, $endDate, $period);

        $groupColumn = $config['group_column'];

        $results = $this->orderItemRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->select(
                DB::raw("$groupColumn AS date"),
                DB::raw('COUNT(*) AS total')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get();

        $stats = [];

        foreach ($config['intervals'] as $interval) {
            $total = $results->where('date', $interval['filter'])->first();

            $stats[] = [
                'label' => $interval['start'],
                'total' => $total?->total ?? 0,
            ];
        }

        return $stats;
    }

    /**
     * Returns products added to wishlist over time
<<<<<<< HEAD
     * 
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @return array
=======
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalProductsAddedToWishlistOverTime($startDate, $endDate, $period = 'auto'): array
    {
        $config = $this->getTimeInterval($startDate, $endDate, $period);

        $groupColumn = $config['group_column'];

        $results = $this->wishlistRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->select(
                DB::raw("$groupColumn AS date"),
                DB::raw('COUNT(*) AS total')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get();

        $stats = [];

        foreach ($config['intervals'] as $interval) {
            $total = $results->where('date', $interval['filter'])->first();

            $stats[] = [
                'label' => $interval['start'],
                'total' => $total?->total ?? 0,
            ];
        }

        return $stats;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
