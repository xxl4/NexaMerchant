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
    protected $signature = 'shopify:webhooks:get {--shopify_store_id=} {--force=} {--ids=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get webhooks List';

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

        //delete
        // $webhook_id = "1494529671450";
        // $this->deletewebhook($webhook_id, $shopify);


        // @https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#get-webhooks
        $base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/webhooks.json';
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

        var_dump($body);


    }


    /**
     * 
     * webhook delete
     * 
     * 
     */
    public function deletewebhook($id, $shopify) {
        $client = new Client();
        $base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/webhooks/'.$id.'.json';
        //$base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/customers.json?limit=2&ids=7927054762214'; // for test
        $this->error("base url ". $base_url);
        $response = $client->delete($base_url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
            ]
        ]);

        $body = $response->getBody();

        $body = json_decode($body, true);

        var_dump($body);
    }

}