<?php

namespace Webkul\Admin\Helpers\Reporting;

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
=======
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\OrderRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Sales\Repositories\RefundRepository;

class Sale extends AbstractReporting
{
    /**
     * Create a helper instance.
     *
<<<<<<< HEAD
     * @param  \Webkul\Sales\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Sales\Repositories\OrderItemRepository  $orderItemRepository
     * @param  \Webkul\Sales\Repositories\InvoiceRepository  $invoiceRepository
     * @param  \Webkul\Sales\Repositories\RefundRepository  $refundRepository
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderItemRepository $orderItemRepository,
        protected InvoiceRepository $invoiceRepository,
        protected RefundRepository $refundRepository
    ) {
        parent::__construct();
    }

    /**
     * Retrieves total orders and their progress.
     *
     * @return array
     */
    public function getTotalOrdersProgress()
    {
        return [
            'previous' => $previous = $this->getTotalOrders($this->lastStartDate, $this->lastEndDate),
            'current'  => $current = $this->getTotalOrders($this->startDate, $this->endDate),
            'progress' => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Returns previous orders over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousTotalOrdersOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalOrdersOverTime($this->lastStartDate, $this->lastEndDate, $period, $includeEmpty);
    }

    /**
     * Returns current orders over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentTotalOrdersOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalOrdersOverTime($this->startDate, $this->endDate, $period, $includeEmpty);
    }

    /**
     * Retrieves total orders
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
<<<<<<< HEAD
     * @return int
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalOrders($startDate, $endDate): int
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
    }

    /**
     * Returns orders over time
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalOrdersOverTime($startDate, $endDate, $period, $includeEmpty): array
    {
        return $this->getOverTimeStats(
            $startDate,
            $endDate,
            'COUNT(*)',
            $period
        );
    }

    /**
     * Retrieves today orders and their progress.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTodayOrdersProgress(): array
    {
        return [
            'previous' => $previous = $this->getTotalOrders(now()->subDay()->startOfDay(), now()->subDay()->endOfDay()),
            'current'  => $current = $this->getTotalOrders(now()->today(), now()->endOfDay()),
            'progress' => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves orders
     *
     * @return array
     */
    public function getTodayOrders()
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->with(['addresses', 'payment', 'items'])
            ->whereBetween('orders.created_at', [now()->today(), now()->endOfDay()])
            ->get();
    }

    /**
     * Retrieves total sales and their progress.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalSalesProgress(): array
    {
        return [
            'previous'        => $previous = $this->getTotalSales($this->lastStartDate, $this->lastEndDate),
            'current'         => $current = $this->getTotalSales($this->startDate, $this->endDate),
            'formatted_total' => core()->formatBasePrice($current),
            'progress'        => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
<<<<<<< HEAD
     * Retrieves today sales and their progress.
     *
     * @return array
=======
     * Retrieves sub total sales and their progress.
     */
    public function getSubTotalSalesProgress(): array
    {
        return [
            'previous'        => $previous = $this->getSubTotalSales($this->lastStartDate, $this->lastEndDate),
            'current'         => $current = $this->getSubTotalSales($this->startDate, $this->endDate),
            'formatted_total' => core()->formatBasePrice($current),
            'progress'        => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves today sales and their progress.
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTodaySalesProgress(): array
    {
        return [
<<<<<<< HEAD
            'previous' => $previous = $this->getTotalSales(now()->subDay()->startOfDay(), now()->subDay()->endOfDay()),
            'current'  => $current = $this->getTotalSales(now()->today(), now()->endOfDay()),
            'progress' => $this->getPercentageChange($previous, $current),
=======
            'previous'        => $previous = $this->getTotalSales(now()->subDay()->startOfDay(), now()->subDay()->endOfDay()),
            'current'         => $current = $this->getTotalSales(now()->today(), now()->endOfDay()),
            'formatted_total' => core()->formatBasePrice($current),
            'progress'        => $this->getPercentageChange($previous, $current),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ];
    }

    /**
     * Retrieves total sales
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
<<<<<<< HEAD
     * @return float
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalSales($startDate, $endDate): float
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum(DB::raw('base_grand_total_invoiced - base_grand_total_refunded'));
    }

    /**
<<<<<<< HEAD
=======
     * Retrieves sub total sales
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     */
    public function getSubTotalSales($startDate, $endDate): float
    {
        return $this->orderRepository
            ->resetModel()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum(DB::raw('base_sub_total_invoiced - base_sub_total_refunded'));
    }

    /**
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Returns previous sales over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousTotalSalesOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalSalesOverTime($this->lastStartDate, $this->lastEndDate, $period, $includeEmpty);
    }

    /**
     * Returns current sales over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentTotalSalesOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTotalSalesOverTime($this->startDate, $this->endDate, $period, $includeEmpty);
    }

    /**
     * Returns sales over time
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalSalesOverTime($startDate, $endDate, $period, $includeEmpty): array
    {
        return $this->getOverTimeStats(
            $startDate,
            $endDate,
            'SUM(base_grand_total_invoiced - base_grand_total_refunded)',
            $period
        );
    }

    /**
     * Retrieves average sales and their progress.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getAverageSalesProgress(): array
    {
        return [
            'previous'        => $previous = $this->getAverageSales($this->lastStartDate, $this->lastEndDate),
            'current'         => $current = $this->getAverageSales($this->startDate, $this->endDate),
            'formatted_total' => core()->formatBasePrice($current),
            'progress'        => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves average sales
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return array
     */
    public function getAverageSales($startDate, $endDate): ?float
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->avg(DB::raw('base_grand_total_invoiced - base_grand_total_refunded'));
    }

    /**
     * Returns previous average sales over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousAverageSalesOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getAverageSalesOverTime($this->lastStartDate, $this->lastEndDate, $period, $includeEmpty);
    }

    /**
     * Returns current average sales over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentAverageSalesOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getAverageSalesOverTime($this->startDate, $this->endDate, $period, $includeEmpty);
    }

    /**
     * Returns average sales over time
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getAverageSalesOverTime($startDate, $endDate, $period, $includeEmpty): array
    {
        return $this->getOverTimeStats(
            $startDate,
            $endDate,
            'AVG(base_grand_total_invoiced - base_grand_total_refunded)',
            $period
        );
    }

    /**
     * Retrieves refunds and their progress.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getRefundsProgress(): array
    {
        return [
            'previous'        => $previous = $this->getRefunds($this->lastStartDate, $this->lastEndDate),
            'current'         => $current = $this->getRefunds($this->startDate, $this->endDate),
            'formatted_total' => core()->formatBasePrice($current),
            'progress'        => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves refunds
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return array
     */
    public function getRefunds($startDate, $endDate): float
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum(DB::raw('base_grand_total_refunded'));
    }

    /**
     * Returns previous refunds over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousRefundsOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getRefundsOverTime($this->lastStartDate, $this->lastEndDate, $period, $includeEmpty);
    }

    /**
     * Returns current refunds over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentRefundsOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getRefundsOverTime($this->startDate, $this->endDate, $period, $includeEmpty);
    }

    /**
     * Returns refunds over time
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getRefundsOverTime($startDate, $endDate, $period, $includeEmpty): array
    {
        return $this->getOverTimeStats(
            $startDate,
            $endDate,
            'SUM(base_grand_total_refunded)',
            $period
        );
    }

    /**
     * Retrieves tax collected and their progress.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTaxCollectedProgress(): array
    {
        return [
            'previous'        => $previous = $this->getTaxCollected($this->lastStartDate, $this->lastEndDate),
            'current'         => $current = $this->getTaxCollected($this->startDate, $this->endDate),
            'formatted_total' => core()->formatBasePrice($current),
            'progress'        => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves tax collected
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return array
     */
    public function getTaxCollected($startDate, $endDate): float
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum(DB::raw('base_tax_amount_invoiced - base_tax_amount_refunded'));
    }

    /**
     * Returns previous tax collected over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousTaxCollectedOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTaxCollectedOverTime($this->lastStartDate, $this->lastEndDate, $period, $includeEmpty);
    }

    /**
     * Returns current tax collected over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentTaxCollectedOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getTaxCollectedOverTime($this->startDate, $this->endDate, $period, $includeEmpty);
    }

    /**
     * Returns tax collected over time
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTaxCollectedOverTime($startDate, $endDate, $period, $includeEmpty): array
    {
        return $this->getOverTimeStats(
            $startDate,
            $endDate,
            'SUM(base_tax_amount_invoiced - base_tax_amount_refunded)',
            $period
        );
    }

    /**
     * Returns top tax categories
     *
<<<<<<< HEAD
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTopTaxCategories($limit = null): Collection
    {
        return $this->orderItemRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->leftJoin('tax_categories', 'order_items.tax_category_id', '=', 'tax_categories.id')
            ->select('tax_categories.id as tax_category_id', 'tax_categories.name')
            ->addSelect(DB::raw('SUM(base_tax_amount_invoiced - base_tax_amount_refunded) as total'))
            ->whereBetween('order_items.created_at', [$this->startDate, $this->endDate])
            ->whereNotNull('tax_category_id')
            ->groupBy('tax_category_id')
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }

    /**
     * Retrieves shipping collected and their progress.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getShippingCollectedProgress(): array
    {
        return [
            'previous'        => $previous = $this->getShippingCollected($this->lastStartDate, $this->lastEndDate),
            'current'         => $current = $this->getShippingCollected($this->startDate, $this->endDate),
            'formatted_total' => core()->formatBasePrice($current),
            'progress'        => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves shipping collected
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return array
     */
    public function getShippingCollected($startDate, $endDate): float
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum(DB::raw('base_shipping_invoiced - base_shipping_refunded'));
    }

    /**
     * Returns previous shipping collected over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousShippingCollectedOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getShippingCollectedOverTime($this->lastStartDate, $this->lastEndDate, $period, $includeEmpty);
    }

    /**
     * Returns current shipping collected over time
     *
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentShippingCollectedOverTime($period = 'auto', $includeEmpty = true): array
    {
        return $this->getShippingCollectedOverTime($this->startDate, $this->endDate, $period, $includeEmpty);
    }

    /**
     * Returns shipping collected over time
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @param  bool  $includeEmpty
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getShippingCollectedOverTime($startDate, $endDate, $period, $includeEmpty): array
    {
        return $this->getOverTimeStats(
            $startDate,
            $endDate,
            'SUM(base_shipping_invoiced - base_shipping_refunded)',
            $period
        );
    }

    /**
     * Returns top shipping methods
     *
<<<<<<< HEAD
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTopShippingMethods($limit = null): Collection
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->select('shipping_title as title')
            ->addSelect(DB::raw('SUM(base_shipping_invoiced - base_shipping_refunded) as total'))
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->whereNotNull('shipping_method')
            ->groupBy('shipping_method')
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }

    /**
     * Returns top payment methods
     *
<<<<<<< HEAD
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTopPaymentMethods($limit = null): Collection
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->leftJoin('order_payment', 'orders.id', '=', 'order_payment.order_id')
            ->select('method', 'method_title as title')
            ->addSelect(DB::raw('COUNT(*) as total'))
            ->addSelect(DB::raw('SUM(base_grand_total) as base_total'))
            ->whereBetween('orders.created_at', [$this->startDate, $this->endDate])
            ->groupBy('method')
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }

    /**
     * Gets the total amount of pending invoices.
<<<<<<< HEAD
     *
     * @return float
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalPendingInvoicesAmount(): float
    {
        return $this->invoiceRepository->getTotalPendingInvoicesAmount();
    }

    /**
     * Retrieves total unique cart users
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return array
     */
    public function getTotalUniqueOrdersUsers($startDate, $endDate): int
    {
        return $this->orderRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(DB::raw('CONCAT(customer_email, "-", customer_id)'))
            ->get()
            ->count();
    }

    /**
     * Returns over time stats.
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $valueColumn
     * @param  string  $period
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getOverTimeStats($startDate, $endDate, $valueColumn, $period = 'auto'): array
    {
        $config = $this->getTimeInterval($startDate, $endDate, $period);

        $groupColumn = $config['group_column'];

        $results = $this->orderRepository
<<<<<<< HEAD
            ->select(
                DB::raw("$groupColumn AS date"),
                DB::raw("$valueColumn AS total"),
                DB::raw("COUNT(*) AS count")
=======
            ->resetModel()
            ->select(
                DB::raw("$groupColumn AS date"),
                DB::raw("$valueColumn AS total"),
                DB::raw('COUNT(*) AS count')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get();

        foreach ($config['intervals'] as $interval) {
            $total = $results->where('date', $interval['filter'])->first();

            $stats[] = [
                'label' => $interval['start'],
                'total' => $total?->total ?? 0,
                'count' => $total?->count ?? 0,
            ];
        }

<<<<<<< HEAD
        return $stats;
=======
        return $stats ?? [];
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }
}
