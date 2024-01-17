<?php
<<<<<<< HEAD
 
namespace Webkul\Core\Jobs;
 
=======

namespace Webkul\Core\Jobs;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
<<<<<<< HEAD
use Carbon\Carbon;
use Webkul\Core\Repositories\VisitRepository;
 
class UpdateCreateVisitIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
=======
use Webkul\Core\Repositories\VisitRepository;

class UpdateCreateVisitIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * Create a new job instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  array  $log
     * @return void
     */
    public function __construct(
        protected $model,
        protected $log
<<<<<<< HEAD
    )
    {
    }
 
=======
    ) {
    }

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $visitRepository = app(VisitRepository::class);

        $lastVisit = $visitRepository->where(Arr::only($this->log, [
            'method',
            'url',
            'ip',
            'visitor_id',
            'visitor_type',
        ]))->latest()->first();

        if ($lastVisit?->created_at->isToday()) {
            return;
        }

<<<<<<< HEAD
        if (null !== $this->model && method_exists($this->model, 'visitLogs')) {
=======
        if ($this->model !== null && method_exists($this->model, 'visitLogs')) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            $this->model->visitLogs()->create($this->log);
        } else {
            $visitRepository->create($this->log);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
