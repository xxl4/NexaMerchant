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
use Webkul\Sales\Models\Order;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:order:create';

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

        // $lists = $this->orderRepository->findWhere([
        //     'status' => 'processing'
        // ]);
        //$lists = Order::where(['status'=>'processing'])->orderBy("updated_at", "desc")->limit(10)->get();
        $lists = Order::where(['id'=>'433'])->orderBy("updated_at", "desc")->limit(10)->get();
       // $lists = Order::where(['id'=>'305'])->orderBy("updated_at", "desc")->limit(10)->get();

        //var_dump($lists);exit;

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
            return false;
        }

        $client = new Client();

        $shopify = $shopifyStore->toArray();

        /**
         * 
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/order#post-orders
         * 
         */
        // $id = 147;
        $order = $this->orderRepository->findOrFail($id);

        //var_dump($order);exit;

        $postOrder = [];

        $line_items = [];

        $products = $order->items;
        foreach($products as $key=>$product) {
            $sku = $product['additional'];

            $skuInfo = explode('-', $sku['product_sku']);
            if(!isset($skuInfo[1])) {
                $this->error("have error" . $id);
                return false;
            }

            $line_item = [];
            $line_item['variant_id'] = $skuInfo[1];
            $line_item ['quantity'] = $product['qty_ordered'];
            $line_item ['requires_shipping'] = true;

            array_push($line_items, $line_item);
        }

        $shipping_address = $order->shipping_address;
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
                "amount" => $order->grand_total,
            ]
        ];

        $postOrder['transactions'] = $transactions;

        $postOrder['financial_status'] = "paid";

        $postOrder['current_subtotal_price'] = $order->sub_total;

        $current_subtotal_price_set = [
            'shop_money' => [
                "amount" => $order->sub_total,
                "currency_code" => $order->order_currency_code,
            ],
            'presentment_money' => [
                "amount" => $order->sub_total,
                "currency_code" => $order->order_currency_code,
            ]
        ];
        $postOrder['current_subtotal_price_set'] = $current_subtotal_price_set;



        // $total_shipping_price_set = [];
        // $shop_money = [];
        // $shop_money['amount'] = $order->shipping_amount;
        // $shop_money['currency_code'] = $order->order_currency_code;
        // $total_shipping_price_set['shop_money'] = $shop_money;
        // $total_shipping_price_set['presentment_money'] = $shop_money;

        $total_shipping_price_set = [
            "shop_money" => [
                "amount" => $order->shipping_amount,
                "currency_code" => $order->order_currency_code,
            ],
            "presentment_money" => [
                "amount" => $order->shipping_amount,
                "currency_code" => $order->order_currency_code,
            ]
        ];

        $postOrder['total_shipping_price_set'] = $total_shipping_price_set;

        // $discount_codes = [];
        // $discount_codes = [
        //     'code' => 'COUPON_CODE',
        //     'amount' => $order->discount_amount,
        //     'type' => 'percentage'
        // ];

        /**
         * 
         * If you're working on a private app and order confirmations are still being sent to the customer when send_receipt is set to false, then you need to disable the Storefront API from the private app's page in the Shopify admin.
         * 
         */

        $postOrder['send_receipt'] = false; 

        // $postOrder['discount_codes'] = $discount_codes;

        $postOrder['current_total_discounts'] = $order->discount_amount;
        $current_total_discounts_set = [
            'shop_money' => [
                'amount' => $order->discount_amount,
                'currency_code' => $order->order_currency_code
            ],
            'presentment_money' => [
                'amount' => $order->discount_amount,
                'currency_code' => $order->order_currency_code
            ]
        ];
        $postOrder['current_total_discounts_set'] = $current_total_discounts_set;
        $postOrder['total_discount'] = $order->discount_amount;
        $total_discount_set = [];
        $total_discount_set = [
            'shop_money' => [
                'amount' => $order->discount_amount,
                'currency_code' => $order->order_currency_code
            ],
            'presentment_money' => [
                'amount' => $order->discount_amount,
                'currency_code' => $order->order_currency_code
            ]
        ];
        $postOrder['total_discount_set'] = $total_discount_set;
        $postOrder['total_discounts'] = $order->discount_amount;


        $shipping_lines = [];

        $shipping_lines = [
            'price' => $order->shipping_amount,
            'code' => 'Standard',
            "title" => "Standard Shipping",
            "source" => "us_post",
            "tax_lines" => [],
            "carrier_identifier" => "third_party_carrier_identifier",
            "requested_fulfillment_service_id" => "third_party_fulfillment_service_id",
            "price_set" => [
                'shop_money' => [
                    'amount' => $order->shipping_amount,
                    'currency_code' => $order->order_currency_code
                ],
                'presentment_money' => [
                    'amount' => $order->shipping_amount,
                    'currency_code' => $order->order_currency_code
                ]
            ]
        ];



        $postOrder['shipping_lines'][] = $shipping_lines;


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
        Log::info("shopify post order body ". json_encode($pOrder));
        Log::info("shopify post order".json_encode($body));

        if(isset($body['order']['id'])) {
            $shopifyNewOrder = $this->ShopifyOrder->where([
                'shopify_order_id' => $body['order']['id']
            ])->first();
            if(is_null($shopifyNewOrder)) $shopifyNewOrder = new \Nicelizhi\Shopify\Models\ShopifyOrder();
            $shopifyNewOrder->order_id = $id;
            $shopifyNewOrder->shopify_order_id = $body['order']['id'];
            $shopifyNewOrder->shopify_store_id = $this->shopify_store_id;
            // $shopifyNewOrder->save();
        }

        exit;
    }
}
