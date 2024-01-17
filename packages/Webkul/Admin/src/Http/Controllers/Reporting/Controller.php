<?php

namespace Webkul\Admin\Http\Controllers\Reporting;

use Maatwebsite\Excel\Facades\Excel;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller as BaseController;
use Webkul\Admin\Exports\ReportingExport;
=======
use Webkul\Admin\Exports\ReportingExport;
use Webkul\Admin\Helpers\Reporting as ReportingHelper;
use Webkul\Admin\Http\Controllers\Controller as BaseController;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class Controller extends BaseController
{
    /**
<<<<<<< HEAD
=======
     * Request param functions.
     *
     * @var array
     */
    protected $typeFunctions = [];

    /**
     * Create a controller instance.
     *
     * @return void
     */
    public function __construct(protected ReportingHelper $reportingHelper)
    {
    }

    /**
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function stats()
    {
        $stats = $this->reportingHelper->{$this->typeFunctions[request()->query('type')]}();

        return response()->json([
            'statistics' => $stats,
            'date_range' => $this->reportingHelper->getDateRange(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewStats()
    {
        $stats = $this->reportingHelper->{$this->typeFunctions[request()->query('type')]}('table');

        return response()->json([
            'statistics' => $stats,
            'date_range' => $this->reportingHelper->getDateRange(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
<<<<<<< HEAD
     * @return \Illuminate\View\View
=======
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function export()
    {
        $stats = $this->reportingHelper->{$this->typeFunctions[request()->query('type')]}('table');

        return Excel::download(new ReportingExport($stats), request()->query('type') . '.' . request()->query('format'));
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
