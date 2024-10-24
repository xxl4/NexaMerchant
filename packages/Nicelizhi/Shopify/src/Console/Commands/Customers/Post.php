<?php

namespace Nicelizhi\Shopify\Console\Commands\Customers;

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
use Illuminate\Support\Facades\Redis;


class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:customers:post {--shopify_store_id=} {--force=} {--ids=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post a New Customer';

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

    
        // base use created at before 1 day
        $lists = Order::where(['status'=>'pending'])->where("created_at", "<=", date("Y-m-d H:i:s", strtotime("-1 day")))->orderBy("updated_at", "desc")->select(['id','customer_email','created_at'])->limit(500)->get();
        //$lists = Order::where(['status'=>'pending'])->where("created", "<=", )->orderBy("updated_at", "desc")->select(['id','customer_email'])->limit(100)->get();
        foreach($lists as $key=>$item) {
            //var_dump($item);exit;

            //check the email is have
            $checkEmail = Redis::get("shopify_customer_".$item->customer_email);
            if($checkEmail) {
                $this->error($item->customer_email." is have");
                continue;
            }


            try {

                $this->postCustomer($item->id,$item->customer_email, $shopify);

                Redis::set("shopify_customer_".$item->customer_email, 1, 3600*24);

            }catch(\Exception $e) {
                var_dump($e->getMessage());
                Log::error(json_encode($e->getMessage()));
                Log::error(json_encode($item));
            }
            //mark the email is have into redis
            //var_dump($item);exit;
        }

        Artisan::call("shopify:customers:get", ["--force"=> true]);


    }

    /**
     * 
     * 
     * @param int order_id
     * @param string email
     * @param array $shopify
     * 
     */
    public function postCustomer($order_id, $email, $shopify) {
        $ShopifyCustomer = $this->ShopifyCustomer->where([
            'email' => $email
        ])->first();
        if(!is_null($ShopifyCustomer)) {
            $this->error($email." is have");
            return false;
        }
        $order = $this->orderRepository->findOrFail($order_id);

        $client = new Client();

        $shipping_address = $order->shipping_address;

        $pOrder = [];


        $addresses = [];
        $addresses[] = [
            "first_name" => $shipping_address->first_name,
            "last_name" => $shipping_address->last_name,
            "address1" => $shipping_address->address1,            
            "phone" => $shipping_address->phone,
            "city" => $shipping_address->city,
            "province" => $shipping_address->state,
            "country" => $shipping_address->country,
            "zip" => $shipping_address->postcode
        ];

        $email_marketing_consent = [];
        $email_marketing_consent['state'] = "subscribed";
        $email_marketing_consent['opt_in_level'] = "confirmed_opt_in";
        $email_marketing_consent['consent_updated_at'] = date("c");

        $note = "";

        $products = $order->items;

        foreach($products as $key=>$product){
            $sku = $product['additional'];
            if(!isset($sku['attribute_name'])) continue;
            $note .= $sku['product_sku'].$sku['attribute_name']."\r\n";
        }

        $customer = [];
        $customer = [
            "first_name" => $shipping_address->first_name,
            "last_name"  => $shipping_address->last_name,
            "email"     => $shipping_address->email,
            //"phone"     => $shipping_address->phone,
            "verified_email"   => true,
            "addresses"  => $addresses,
            'tags'      => 'pending',
            'email_marketing_consent' => $email_marketing_consent,
            'currency'  => config("app.currency"),
            'note'      => $note,
        ];
        $pOrder['customer'] = $customer;


        try {
            $response = $client->post($shopify['shopify_app_host_name'].'/admin/api/2023-10/customers.json', [
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
            Log::error(json_encode($pOrder));
            //\Nicelizhi\Shopify\Helpers\Utils::send($e->getMessage().'--' .$id. " 需要手动解决 ");
            //continue;
            //return false;
        }catch(\GuzzleHttp\Exception\RequestException $e){
            var_dump($e->getMessage());
        }finally  {
            
        }

        


    }
}