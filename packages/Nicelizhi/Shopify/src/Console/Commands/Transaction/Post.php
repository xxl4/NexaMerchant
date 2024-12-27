<?php

namespace Nicelizhi\Shopify\Console\Commands\Transaction;

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
use Webkul\Customer\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Event;

class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:transaction:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post Transaction info';


    private $shopify_store_id = null;
    private $lang = null;

    private $customerRepository = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->ShopifyOrder = new ShopifyOrder();
        $this->ShopifyStore = new ShopifyStore();
        $this->customerRepository = app(CustomerRepository::class);
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

        $order_id = "6257605869854";

        $client = new Client();

        $shopify = $shopifyStore->toArray();

        $pOrder = [];

        $transaction = [
            "kind" => "void",
            "manual_payment_gateway" => "true",
            "gateway" => "cash",
            "amount" => "10.00",
            "currency" => "RON",
            "payment_details" => [
                "payment_method_name" => "cash_on_delivery"
            ],
            "status" => "success",
            "source_name" => "web",
            "order_id" => $order_id,
            

        ];

        $pOrder['transaction'] = $transaction;

        var_dump($pOrder);

        
        try {
            $response = $client->post($shopify['shopify_app_host_name'].'/admin/api/2024-10/orders/'.$order_id.'/transactions.json', [
                'http_errors' => true,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
                ],
                'body' => json_encode($pOrder)
            ]);
        }catch(ClientException $e) {
            //var_dump($e);
            var_dump($e->getMessage());
            Log::error(json_encode($e->getMessage()));
            //continue;
            return false;
        }

        var_dump($response->getBody());


    }
}