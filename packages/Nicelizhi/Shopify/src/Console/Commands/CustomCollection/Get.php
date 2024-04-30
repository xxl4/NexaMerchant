<?php

namespace Nicelizhi\Shopify\Console\Commands\CustomCollection;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Illuminate\Support\Facades\Cache;


use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;
use GuzzleHttp\Exception\ClientException;

class Get extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:CustomCollection:get {--shopify_store_id=} {--force=} {--ids=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get CustomCollection List';

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

        $force = $this->option('force');

        if($force==true) {
            Cache::put("shopify_day", 1);
        }

        // $created_at_min = date("c", strtotime("-3 days"));
        // $created_at_max = date("c");

        $day = Cache::get("shopify_day");

        if(empty($day)) $day = 0;

        $day = $day + 1;

        $start = $day - 1;
        $end = $day - 2;


        $created_at_min = date("c", strtotime("-".$start." days"));
        $created_at_max = date("c", strtotime("-".$end." days"));

        $created_at_min = date("c", strtotime("-3 days"));
        $created_at_max = date("c");

        $this->info("processed at min ". $created_at_min);
        $this->info("processed at max ". $created_at_max);
        //exit;

        


        // @https://shopify.dev/docs/api/admin-rest/2023-10/resources/customer#get-customers?ids=207119551,1073339482
        $base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/custom_collections.json?created_at_min='.$created_at_min.'&created_at_max='.$created_at_max.'&limit=250';
        //$base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/customers.json?limit=2&ids=7927054762214'; // for test
        $this->error("base url ". $base_url);
        $response = $client->get($base_url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
            ]
        ]);

        $body = $response->getBody();
        $body = json_decode($body, true);
        $i = 1;

        foreach($body['custom_collections'] as $key=>$collection) {
            $userCollection = \Nicelizhi\Shopify\Models\ShopifyCustomCollection::where("collection_id", $collection['id'])->first();
            if(is_null($userCollection)) $userCollection = new \Nicelizhi\Shopify\Models\ShopifyCustomCollection;
            $userCollection->shopify_store_id = $this->shopify_store_id;
            $userCollection->collection_id = $collection['id'];
            $userCollection->handle = $collection['handle'];
            $userCollection->sprt_order = $collection['sort_order'];
            $userCollection->published_scope = $collection['published_scope'];
            $userCollection->title = $collection['title'];
            $userCollection->body_html = $collection['body_html'];
            $userCollection->published_scope = $collection['published_scope'];
            $userCollection->template_suffix = $collection['template_suffix'];
            $userCollection->admin_graphql_api_id = $collection['admin_graphql_api_id'];
            $userCollection->save();
        }
        

        Cache::put("shopify_day", $day);

    }
}