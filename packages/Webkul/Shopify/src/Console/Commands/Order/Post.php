<?php

namespace Nicelizhi\Shopify\Console\Commands\Order;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Admin\DataGrids\Sales\OrderDataGrid;

use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;

class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:order:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create Order';

    private $shopify_store_id = "";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected ShopifyOrder $ShopifyOrder,
        protected ShopifyStore $ShopifyStore,
        protected OrderCommentRepository $orderCommentRepository
    )
    {
        $this->shopify_store_id = "hatmeo";
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $this->shopify_store_id)->first();

        if(is_null($shopifyStore)) {
            $this->error("no store");
            return false;
        }

        $lists = $this->orderRepository->findWhere([
            'status' => 'processing'
        ]);

        //var_dump($lists);

        foreach($lists as $key=>$list) {
            $this->info("start post order " . $list->id);
            $this->postOrder($list->id, $shopifyStore);
        }


        
    }

    public function postOrder($id, $shopifyStore) {
        // check the shopify have sync

        $shopifyOrder = $this->ShopifyOrder->where([
            'order_id' => $id
        ])->first();
        if(!is_null($shopifyOrder)) {
            //var_dump($shopifyOrder);
            return false;
        }

        //var_dump($id);
        //exit;


        $client = new Client();

        $shopify = $shopifyStore->toArray();

        //$shopify = config("shopify");
        /**
         * 
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/order#post-orders
         * 
         */
        // $id = 147;
        $order = $this->orderRepository->findOrFail($id);

        //var_dump($order);exit;

        //var_dump($order->shipping_address);

        //var_dump($order);exit;

        $postOrder = [];

        $line_items = [];
/*
        $line_items [
            [
                "variant_id" => '',
                "quantity" => 1
            ]
        ];
*/

        $products = $order->items;
        foreach($products as $key=>$product) {
            $sku = $product['additional'];

            //var_dump($sku);
            $skuInfo = explode('-', $sku['product_sku']);
            if(!isset($skuInfo[1])) {
                $this->error("have error" . $id);
                return false;
            }

            $line_item = [];
            $line_item['variant_id'] = $skuInfo[1];
            $line_item ['quantity'] = $product['qty_ordered'];

            array_push($line_items, $line_item);
        }

        //var_dump($line_items);

        //exit;
        $shipping_address = $order->shipping_address;

        

        // products
        $postOrder['line_items'] = $line_items;


        $customer = [];
        $customer = [
            "first_name" => $shipping_address->first_name,
            "last_name"  => $shipping_address->last_name,
            "email"     => $shipping_address->email,
        ];
        $postOrder['customer'] = $customer;

        

        $billing_address = [
            "first_name" => $shipping_address->first_name,
            "last_name" => $shipping_address->last_name,
            "address1" => $shipping_address->address1,
            "phone" => $shipping_address->phone,
            "city" => $shipping_address->city,
            "province" => $shipping_address->state,
            "country" => $shipping_address->country,
            "zip" => $shipping_address->postcode
        ];
        $postOrder['billing_address'] = $billing_address;
        

        $shipping_address = [
            "first_name" => $shipping_address->first_name,
            "last_name" => $shipping_address->last_name,
            "address1" => $shipping_address->address1,
            "phone" => $shipping_address->phone,
            "city" => $shipping_address->city,
            "province" => $shipping_address->state,
            "country" => $shipping_address->country,
            "zip" => $shipping_address->postcode
        ];

        $postOrder['shipping_address'] = $shipping_address;

        $postOrder['email'] = "";
        
        $transactions = [];

        $transactions = [
            [
                "kind" => "sales",
                "status" => "success",
                "amount" => $order->sub_total,
            ]
        ];

        $postOrder['transactions'] = $transactions;

        $postOrder['financial_status'] = "paid";

        //$postOrder['total_tax'] = $order->shipping_amount;
        $postOrder['total_price'] = $order->sub_total;
        $total_shipping_price_set = [];
        $shop_money = [];
        $shop_money['amount'] = $order->shipping_amount;
        $shop_money['currency_code'] = $order->order_currency_code;
        $total_shipping_price_set['shop_money'] = $shop_money;

        $postOrder['total_shipping_price_set'] = $total_shipping_price_set;

        $pOrder['order'] = $postOrder;

        //var_dump($pOrder);exit;

        $response = $client->post($shopify['shopify_app_host_name'].'/admin/api/2023-10/orders.json', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
            ],
            'body' => json_encode($pOrder)
        ]);

        $body = json_decode($response->getBody(), true);

        //var_dump($body);exit;

        if(isset($body['order']['id'])) {
            $shopifyNewOrder = $this->ShopifyOrder->where([
                'shopify_order_id' => $body['order']['id']
            ])->first();
            if(is_null($shopifyNewOrder)) $shopifyNewOrder = new \Nicelizhi\Shopify\Models\ShopifyOrder();
            $shopifyNewOrder->order_id = $id;
            $shopifyNewOrder->shopify_order_id = $body['order']['id'];
            $shopifyNewOrder->shopify_store_id = $this->shopify_store_id;
            $shopifyNewOrder->save();
        }

        exit;
    }
}
