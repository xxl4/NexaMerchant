<?php

namespace Nicelizhi\Shopify\Console\Commands\Refund;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Webkul\Sales\Repositories\OrderRepository;
use Illuminate\Support\Facades\Cache;
use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Webkul\Sales\Models\Order;
use Illuminate\Http\Client\RequestException;
use GuzzleHttp\Exception\ClientException;

class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:refund:post {--order_id=} {--refund_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'shopify:refund:post {--order_id=} {--refund_id=}';

    private $shopify_store_id = null;
    private $lang = null;

    //protected ShopifyOrder $ShopifyOrder,
    //protected ShopifyStore $ShopifyStore,

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        
    )
    {
        $this->ShopifyOrder = new ShopifyOrder();
        $this->ShopifyStore = new ShopifyStore();
        $this->Order = new Order();

        $this->shopify_store_id = config('shopify.shopify_store_id');
        $this->lang = config('shopify.store_lang');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $shopifyStore = Cache::get("shopify_store_".$this->shopify_store_id);

        if(empty($shopifyStore)){
            $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $this->shopify_store_id)->first();
            Cache::put("shopify_store_".$this->shopify_store_id, $shopifyStore, 3600);
        }


        if(is_null($shopifyStore)) {
            $this->error("no store");
            return false;
        }

        $order_id = $this->option("order_id");
        $refund_id = $this->option("refund_id");


        
    }

    
}
