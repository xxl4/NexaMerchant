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
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;
<<<<<<< HEAD
use Webkul\Core\Jobs\UpdateCreateVisitIndex;
 
class UpdateCreateVisitableIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
=======

class UpdateCreateVisitableIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * Create a new job instance.
     *
     * @param  array  $log
     * @return void
     */
    public function __construct(protected $log)
    {
    }
<<<<<<< HEAD
 
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        $slugOrPath = urldecode(trim($this->log['path_info'], '/'));
=======
        $slugOrURLKey = urldecode(trim($this->log['path_info'], '/'));
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        /**
         * Support url for chinese, japanese, arabic and english with numbers.
         */
<<<<<<< HEAD
        if (! preg_match('/^([\x{0621}-\x{064A}\x{4e00}-\x{9fa5}\x{3402}-\x{FA6D}\x{3041}-\x{30A0}\x{30A0}-\x{31FF}_a-z0-9-]+\/?)+$/u', $slugOrPath)) {
            UpdateCreateVisitIndex::dispatch(null, $this->log);
    
            return;
        }

        $category = app(CategoryRepository::class)->findByPath($slugOrPath);
=======
        if (! preg_match('/^([\x{0621}-\x{064A}\x{4e00}-\x{9fa5}\x{3402}-\x{FA6D}\x{3041}-\x{30A0}\x{30A0}-\x{31FF}_a-z0-9-]+\/?)+$/u', $slugOrURLKey)) {
            UpdateCreateVisitIndex::dispatch(null, $this->log);

            return;
        }

        $category = app(CategoryRepository::class)->findBySlug($slugOrURLKey);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        if ($category) {
            UpdateCreateVisitIndex::dispatch($category, $this->log);

            return;
        }

<<<<<<< HEAD
        $product = app(ProductRepository::class)->findBySlug($slugOrPath);
=======
        $product = app(ProductRepository::class)->findBySlug($slugOrURLKey);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        if (
            ! $product
            || ! $product->visible_individually
            || ! $product->url_key
            || ! $product->status
        ) {
            return;
        }

        UpdateCreateVisitIndex::dispatch($product, $this->log);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
