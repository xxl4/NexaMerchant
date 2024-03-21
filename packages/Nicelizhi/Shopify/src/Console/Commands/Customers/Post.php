<?php

namespace Nicelizhi\Shopify\Console\Commands\Customers;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Admin\DataGrids\Sales\OrderDataGrid;
use Webkul\Sales\Repositories\ShipmentRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Illuminate\Support\Facades\Cache;

use Webkul\Sales\Models\Order;
use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Nicelizhi\Shopify\Models\ShopifyCustomer;


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

        $client = new Client();

        $lists = Order::where(['status'=>'pending'])->orderBy("updated_at", "desc")->select(['id','customer_email'])->limit(1)->get();
        foreach($lists as $key=>$item) {
            $this->postCustomer($item->id,$item->customer_email, $shopify);
        }

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
            return false;
        }
        $order = $this->orderRepository->findOrFail($order_id);

        $shipping_address = $order->shipping_address;


        $addresses = [];
        $addresses = [
            "first_name" => $shipping_address->first_name,
            "last_name" => $shipping_address->last_name,
            "address1" => $shipping_address->address1,            
            "phone" => $shipping_address->phone,
            "city" => $shipping_address->city,
            "province" => $shipping_address->state,
            "country" => $shipping_address->country,
            "zip" => $shipping_address->postcode
        ];

        $customer = [];
        $customer = [
            "first_name" => $shipping_address->first_name,
            "last_name"  => $shipping_address->last_name,
            "email"     => $shipping_address->email,
            "phone"     => $shipping_address->phone,
            "verified_email"     => true,
            "addresses"  => $addresses,
        ];
        $postOrder['customer'] = $customer;

        var_dump($postOrder);exit;


    }
}