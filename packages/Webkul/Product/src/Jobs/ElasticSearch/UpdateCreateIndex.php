<?php
<<<<<<< HEAD
 
namespace Webkul\Product\Jobs\ElasticSearch;
 
=======

namespace Webkul\Product\Jobs\ElasticSearch;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Helpers\Indexers\ElasticSearch;
 
class UpdateCreateIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
=======
use Webkul\Product\Helpers\Indexers\ElasticSearch;
use Webkul\Product\Repositories\ProductRepository;

class UpdateCreateIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * Create a new job instance.
     *
     * @param  array  $productIds
     * @return void
     */
    public function __construct(protected $productIds)
    {
        $this->productIds = $productIds;
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
        if (core()->getConfigData('catalog.products.storefront.search_mode') != 'elastic') {
            return;
        }

        $ids = implode(',', $this->productIds);

        $products = app(ProductRepository::class)
            ->whereIn('id', $this->productIds)
            ->orderByRaw("FIELD(id, $ids)")
            ->get();
<<<<<<< HEAD
        
        app(ElasticSearch::class)->reindexRows($products);
    }
}
=======

        app(ElasticSearch::class)->reindexRows($products);
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
