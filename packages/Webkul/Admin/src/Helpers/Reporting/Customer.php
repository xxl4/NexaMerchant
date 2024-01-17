<?php

namespace Webkul\Admin\Helpers\Reporting;

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Product\Repositories\ProductReviewRepository;
=======
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\Sales\Repositories\OrderRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class Customer extends AbstractReporting
{
    /**
     * Create a helper instance.
<<<<<<< HEAD
     * 
     * @param  \Webkul\Customer\Repositories\CustomerRepository  $customerRepository
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Product\Repositories\ProductReviewRepository  $reviewRepository
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected OrderRepository $orderRepository,
        protected ProductReviewRepository $reviewRepository
<<<<<<< HEAD
    )
    {
=======
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        parent::__construct();
    }

    /**
     * Retrieves total customers and their progress.
<<<<<<< HEAD
     * 
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalCustomersProgress(): array
    {
        return [
            'previous' => $previous = $this->getTotalCustomers($this->lastStartDate, $this->lastEndDate),
            'current'  => $current = $this->getTotalCustomers($this->startDate, $this->endDate),
<<<<<<< HEAD
            'progress' => $this->getPercentageChange($previous, $current)
=======
            'progress' => $this->getPercentageChange($previous, $current),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ];
    }

    /**
     * Returns previous customers over time
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
    public function getPreviousTotalCustomersOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalCustomersOverTime($this->lastStartDate, $this->lastEndDate, $period);
    }

    /**
     * Returns current customers over time
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
    public function getCurrentTotalCustomersOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalCustomersOverTime($this->startDate, $this->endDate, $period);
    }

    /**
     * Retrieves today customers and their progress.
<<<<<<< HEAD
     * 
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTodayCustomersProgress(): array
    {
        return [
            'previous' => $previous = $this->getTotalCustomers(now()->subDay()->startOfDay(), now()->subDay()->endOfDay()),
            'current'  => $current = $this->getTotalCustomers(now()->today(), now()->endOfDay()),
<<<<<<< HEAD
            'progress' => $this->getPercentageChange($previous, $current)
=======
            'progress' => $this->getPercentageChange($previous, $current),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ];
    }

    /**
     * Retrieves total customers by date
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
    public function getTotalCustomers($startDate, $endDate): int
    {
        return $this->customerRepository->getCustomersCountByDate($startDate, $endDate);
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
     * Gets customer with most sales.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     *
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCustomersWithMostSales($limit = null): Collection
    {
        $tablePrefix = DB::getTablePrefix();

        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->addSelect(
                'orders.customer_id as id',
                'orders.customer_email as email',
                DB::raw('CONCAT(' . $tablePrefix . 'orders.customer_first_name, " ", ' . $tablePrefix . 'orders.customer_last_name) as full_name'),
                DB::raw('SUM(base_grand_total_invoiced - base_grand_total_refunded) as total'),
                DB::raw('COUNT(*) as orders')
            )
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->groupBy(DB::raw('CONCAT(customer_email, "-", customer_id)'))
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }

    /**
     * Gets customer with most orders.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     *
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCustomersWithMostOrders($limit = null): Collection
    {
        $tablePrefix = DB::getTablePrefix();

        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->addSelect(
                'orders.customer_id as id',
                'orders.customer_email as email',
                DB::raw('CONCAT(' . $tablePrefix . 'orders.customer_first_name, " ", ' . $tablePrefix . 'orders.customer_last_name) as full_name'),
                DB::raw('COUNT(*) as orders')
            )
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->groupBy(DB::raw('CONCAT(customer_email, "-", customer_id)'))
            ->orderByDesc('orders')
            ->limit($limit)
            ->get();
    }

    /**
     * Gets customer with most orders.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     *
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCustomersWithMostReviews($limit = null): Collection
    {
        $tablePrefix = DB::getTablePrefix();

        return $this->reviewRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->leftJoin('customers', 'product_reviews.customer_id', '=', 'customers.id')
            ->addSelect(
                'customers.id as id',
                'customers.email as email',
                DB::raw('CONCAT(' . $tablePrefix . 'customers.first_name, " ", ' . $tablePrefix . 'customers.last_name) as full_name'),
                DB::raw('COUNT(*) as reviews')
            )
            ->whereBetween('product_reviews.created_at', [$this->startDate, $this->endDate])
            ->where('product_reviews.status', 'approved')
            ->whereNotNull('customer_id')
<<<<<<< HEAD
            ->groupBy(DB::raw('CONCAT(email, "-", customers.id)'))
=======
            ->groupBy(DB::raw('CONCAT(email, "-", ' . $tablePrefix . 'customers.id)'))
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->orderByDesc('reviews')
            ->limit($limit)
            ->get();
    }

    /**
     * Gets customer with most sales.
<<<<<<< HEAD
     * 
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     *
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getGroupsWithMostCustomers($limit = null): Collection
    {
        return $this->customerRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->leftJoin('customer_groups', 'customers.customer_group_id', '=', 'customer_groups.id')
            ->select('customers.id as id', 'customer_groups.name as group_name')
            ->addSelect(DB::raw('COUNT(*) as total'))
            ->whereBetween('customers.created_at', [$this->startDate, $this->endDate])
            ->groupBy('customer_group_id')
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }

    /**
     * Returns over time stats.
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
    public function getTotalCustomersOverTime($startDate, $endDate, $period = 'auto'): array
    {
        $config = $this->getTimeInterval($startDate, $endDate, $period);

        $groupColumn = $config['group_column'];

        $results = $this->customerRepository
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
