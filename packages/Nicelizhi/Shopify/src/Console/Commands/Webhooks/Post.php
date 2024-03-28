<?php

namespace Nicelizhi\Shopify\Console\Commands\Webhooks;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Illuminate\Support\Facades\Cache;

use Webkul\Sales\Models\Order;
use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Nicelizhi\Shopify\Models\ShopifyCustomer;
use Illuminate\Support\Facades\Artisan;
use GuzzleHttp\Exception\ClientException;


class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:webhooks:post {--shopify_store_id=} {--force=} {--ids=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post a New webhooks';

    private $lang = null;
    private $shopify_store_id = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected ShopifyOrder $ShopifyOrder,
        protected ShopifyStore $ShopifyStore,
        protected ShopifyCustomer $ShopifyCustomer,
        protected ShipmentRepository $shipmentRepository,
        protected OrderItemRepository $orderItemRepository,
        protected OrderCommentRepository $orderCommentRepository
    )
    {
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
        $shopify = $shopifyStore->toArray();

        

        $client = new Client();
        $post = [];

        //@link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics

        $topic = [];
        // orders
        $topic[] = "orders/create";
        $topic[] = "orders/edited";
        $topic[] = "orders/paid";
        $topic[] = "orders/fulfilled";
        $topic[] = "orders/updated";

        // orders transaction
        $topic[] = "order_transactions/create";

        // products
        $topic[] = "products/create";
        $topic[] = "products/delete";
        $topic[] = "products/update";

        // refunds
        $topic[] = "refunds/create";

        // fulfillments
        $topic[] = "fulfillments/create";
        $topic[] = "fulfillments/update";

        foreach($topic as $key=>$tp) {
            $this->addHook($tp, $shopify);
            sleep(1);

        }
    }

    public function addHook($topic, $shopify) {
        $this->info("topic " . $topic. " adding ");
        $client = new Client();
        $post = [];

        //@link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics

        $webhook = [];
        $webhook['address'] = config('app.url')."/shopify/v1/webhooks/".$topic;
        $webhook['topic'] = $topic;
        $webhook['format'] = "json";
        //$webhook['api_version'] = "2024-01"; // This version need check your app chose 


        $post['webhook'] = $webhook;

        //var_dump($post);exit;
        

        try {
            $response = $client->post($shopify['shopify_app_host_name'].'/admin/api/2023-10/webhooks.json', [
                'http_errors' => true,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
                ],
                'body' => json_encode($post)
            ]);

            var_dump(json_decode($response->getBody())); 
            //exit;
            //sleep(1);

        }catch(ClientException $e) {
            //var_dump($e);
            var_dump($e->getMessage());
            Log::error(json_encode($e->getMessage()));

            //continue;
            //return false;
        }catch(\GuzzleHttp\Exception\RequestException $e){
            var_dump($e->getMessage());
        }finally  {
            
        }
    }

}