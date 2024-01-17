<?php

namespace Webkul\Admin\Helpers\Reporting;

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
=======
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Core\Repositories\VisitRepository;

class Visitor extends AbstractReporting
{
    /**
     * Create a helper instance.
<<<<<<< HEAD
     * 
     * @param  \Webkul\Core\Repositories\VisitRepository  $visitRepository
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(protected VisitRepository $visitRepository)
    {
        parent::__construct();
    }

    /**
     * Retrieves total visitors and their progress.
<<<<<<< HEAD
     * 
     * @param  string  $visitableType
     * @return array
=======
     *
     * @param  string  $visitableType
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalVisitorsProgress($visitableType = null): array
    {
        return [
            'previous' => $previous = $this->getTotalVisitors($this->lastStartDate, $this->lastEndDate, $visitableType),
            'current'  => $current = $this->getTotalVisitors($this->startDate, $this->endDate, $visitableType),
            'progress' => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves total visitors and their progress.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $visitableType
     * @return array
     */
    public function getTotalVisitors($startDate, $endDate, $visitableType = null): int
    {
        if ($visitableType) {
            return $this->visitRepository
<<<<<<< HEAD
=======
                ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ->where('visitable_type', $visitableType)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get()
                ->count();
        }

        return $this->visitRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereNull('visitable_id')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->count();
    }

    /**
     * Retrieves unique visitors and their progress.
<<<<<<< HEAD
     * 
     * @param  string  $visitableType
     * @return array
=======
     *
     * @param  string  $visitableType
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalUniqueVisitorsProgress($visitableType = null): array
    {
        return [
            'previous' => $previous = $this->getTotalUniqueVisitors($this->lastStartDate, $this->lastEndDate, $visitableType),
            'current'  => $current = $this->getTotalUniqueVisitors($this->startDate, $this->endDate, $visitableType),
            'progress' => $this->getPercentageChange($previous, $current),
        ];
    }

    /**
     * Retrieves total unique visitors
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $visitableType
     * @return array
     */
    public function getTotalUniqueVisitors($startDate, $endDate, $visitableType = null): int
    {
        if ($visitableType) {
            return $this->visitRepository
<<<<<<< HEAD
=======
                ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ->where('visitable_type', $visitableType)
                ->groupBy(DB::raw('CONCAT(ip, "-", visitor_id, "-", visitable_type)'))
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get()
                ->count();
        }

        return $this->visitRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->whereNull('visitable_id')
            ->groupBy(DB::raw('CONCAT(ip, "-", visitor_id)'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->count();
    }

    /**
     * Returns previous sales over time
<<<<<<< HEAD
     * 
     * @param  string  $visitableType
     * @return array
=======
     *
     * @param  string  $visitableType
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousTotalVisitorsOverTime($visitableType = null): array
    {
        return $this->getTotalVisitorsOverTime($this->lastStartDate, $this->lastEndDate, 'auto', $visitableType);
    }

    /**
     * Returns current sales over time
<<<<<<< HEAD
     * 
     * @param  string  $visitableType
     * @return array
=======
     *
     * @param  string  $visitableType
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentTotalVisitorsOverTime($visitableType = null): array
    {
        return $this->getTotalVisitorsOverTime($this->startDate, $this->endDate, 'auto', $visitableType);
    }

    /**
     * Returns previous sales over week
<<<<<<< HEAD
     * 
     * @param  string  $visitableType
     * @return array
=======
     *
     * @param  string  $visitableType
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getPreviousTotalVisitorsOverWeek($visitableType = null): array
    {
        return $this->getTotalVisitorsOverWeek($this->lastStartDate, $this->lastEndDate, $visitableType);
    }

    /**
     * Returns current sales over week
<<<<<<< HEAD
     * 
     * @param  string  $visitableType
     * @return array
=======
     *
     * @param  string  $visitableType
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getCurrentTotalVisitorsOverWeek($visitableType = null): array
    {
        return $this->getTotalVisitorsOverWeek($this->startDate, $this->endDate, $visitableType);
    }

    /**
     * Gets visitable with most visits.
<<<<<<< HEAD
     * 
     * @param  string  $visitableType
     * @param  integer  $limit
     * @return \Illuminate\Database\Eloquent\Collection
=======
     *
     * @param  string  $visitableType
     * @param  int  $limit
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getVisitableWithMostVisits($visitableType = null, $limit = null): Collection
    {
        $visits = $this->visitRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->addSelect(
                'id',
                'visitable_type',
                'visitable_id',
                DB::raw('COUNT(*) as visits')
            )
            ->where('visitable_type', $visitableType)
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->groupBy('visitable_id')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get();

        $visits->map(function ($visit) {
            $visit->name = $visit->visitable->name;
        });

        return $visits;
    }

    /**
     * Generates visitor graph data.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $period
     * @param  string  $visitableType
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalVisitorsOverTime($startDate, $endDate, $period = 'auto', $visitableType = null): array
    {
        $config = $this->getTimeInterval($startDate, $endDate, $period);

        $groupColumn = $config['group_column'];

        $results = $this->visitRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->select(
                DB::raw("$groupColumn AS date"),
                DB::raw('COUNT(*) AS total')
            )
            ->whereNull('visitable_id')
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
     * Generates visitor over week graph data.
<<<<<<< HEAD
     * 
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $visitableType
     * @return array
=======
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  string  $visitableType
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function getTotalVisitorsOverWeek($startDate, $endDate, $visitableType = null): array
    {
        $stats = [];

        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        $visits = $this->visitRepository
<<<<<<< HEAD
=======
            ->resetModel()
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->select(
                DB::raw('DAYNAME(created_at) AS day'),
                DB::raw('COUNT(*) AS count')
            )
            ->whereNull('visitable_id')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('day')
            ->get();

<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        foreach ($weekDays as $day) {
            $total = $visits->where('day', $day)->first();

            $stats['label'][] = $day;
            $stats['total'][] = $total?->count ?? 0;
        }

        return $stats;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
