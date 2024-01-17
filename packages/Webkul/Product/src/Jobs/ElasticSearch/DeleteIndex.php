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
use Webkul\Product\Helpers\Indexers\ElasticSearch;

class DeleteIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
<<<<<<< HEAD
 
    /**
     * Create a new job instance.
     *
     * @param  integer  $productId
=======

    /**
     * Create a new job instance.
     *
     * @param  int  $productId
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(protected $productId)
    {
        $this->productId = $productId;
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
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        $removeIndices = [];

        foreach (core()->getAllChannels() as $channel) {
            foreach ($channel->locales as $locale) {
                $index = 'products_' . $channel->code . '_' . $locale->code . '_index';

                $removeIndices[$index][] = $this->productId;
            }
        }

        app(ElasticSearch::class)->deleteIndices($removeIndices);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
