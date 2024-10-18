<?php

namespace Nicelizhi\Shopify\Console\Commands\Order;

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

class PostTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:order:post:test {--order_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create Order shopify:order:post:test {--order_id=}';

    private $shopify_store_id = null;
    private $lang = null;

    private $customerRepository = null;

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

        $order_id = $this->option("order_id");

        if(!empty($order_id)) {
            $lists = Order::where(['status'=>'processing'])->where("id", $order_id)->select(['id'])->limit(1)->get();
        }else{
            $lists = [];
            //$lists = Order::where(['status'=>'processing'])->orderBy("updated_at", "desc")->select(['id'])->limit(100)->get();
        }

        foreach($lists as $key=>$list) {
            $this->info("start post order " . $list->id);
            $this->postOrder($list->id, $shopifyStore);
            $this->syncOrderPrice($list); // sync price to system
            //exit;
        }


        
    }

    /**
     * 
     * 
     * @param object orderitem
     * 
     */
    public function syncOrderPrice($orderItem) {
        if($orderItem->grand_total_invoiced=='0.0000') {
            
            $base_grand_total_invoiced = $orderItem->base_grand_total;
            $grand_total_invoiced = $orderItem->grand_total;
            Order::where(['id'=>$orderItem->id])->update(['grand_total_invoiced'=>$grand_total_invoiced, 'base_grand_total_invoiced'=>$base_grand_total_invoiced]);

        }
        
    }

    public function postOrder($id, $shopifyStore) {
        //return false;
        // check the shopify have sync

        $shopifyOrder = $this->ShopifyOrder->where([
            'order_id' => $id
        ])->first();
        if(!is_null($shopifyOrder)) {
            return false;
        }

        $this->info("sync to order to shopify ".$id);
        echo $id." start post \r\n";

        $client = new Client();

        $shopify = $shopifyStore->toArray();

        /**
         * 
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/order#post-orders
         * 
         */
        // $id = 147;
        $order = $this->Order->findOrFail($id);

        $orderPayment = $order->payment;  

        

        

        //var_dump($order);exit;

        $postOrder = [];

        $line_items = [];

        $products = $order->items;
        $q_ty = 0;
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
            $q_ty += $product['qty_ordered'];
            $line_item ['requires_shipping'] = true;

            array_push($line_items, $line_item);
        }

        $shipping_address = $order->shipping_address;
        $billing_address = $order->billing_address;
        $postOrder['line_items'] = $line_items;


        $customer = [];
        $customer = [
            "first_name" => $shipping_address->first_name,
            "last_name"  => $shipping_address->last_name,
            "email"     => $shipping_address->email,
        ];
        $postOrder['customer'] = $customer;

        $shipping_address->phone = str_replace('undefined', '', $shipping_address->phone);
        $shipping_address->city = empty($shipping_address->city) ? $shipping_address->state : $shipping_address->city;

        $billing_address = [
            "first_name" => $billing_address->first_name,
            "last_name" => $billing_address->last_name,
            "address1" => $billing_address->address1,
            //$input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
            
            "phone" => $shipping_address->phone,
            "city" => $billing_address->city,
            "province" => $billing_address->state,
            "country" => $billing_address->country,
            "zip" => $billing_address->postcode
        ];
        $postOrder['billing_address'] = $billing_address;

        // create user
        $customer = $this->customerRepository->findOneByField('email', $shipping_address->email);
        if(is_null($customer)) {
            $customer = $this->customerRepository->findOneByField('phone', $shipping_address->phone);
            if(is_null($customer)) {

                $data = [];
                $data['email'] = $shipping_address->email;
                $data['customer_group_id'] = 2;
                $data['first_name'] = $shipping_address->first_name;
                $data['last_name'] = $shipping_address->last_name;
                $data['gender'] = $shipping_address->gender;
                $data['phone'] = $shipping_address->phone;

                //var_dump($data);
    
                $this->createCuster($data);
            }
        }
        

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

        //$postOrder['email'] = "";
        
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

        if($order->shipping_amount=='14.9850') {
            $str = "aud order";
            //\Nicelizhi\Shopify\Helpers\Utils::send($str.'--' .$id. " 需要留意查看 ");
            //continue;
            //return false;
            $postOrder['send_receipt'] = false; 
        }else{
            $postOrder['send_receipt'] = true; 
        }

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

        //$postOrder['send_receipt'] = false; 
        //$postOrder['send_receipt'] = true; 

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

        $postOrder['buyer_accepts_marketing'] = true; // 

        $postOrder['name'] = config('shopify.order_pre').'#'.$id;
        $postOrder['order_number'] = $id;
        $postOrder['currency'] = $order->order_currency_code;
        $postOrder['presentment_currency'] = $order->order_currency_code;
        $pOrder['order'] = $postOrder;
        var_dump($pOrder);

        $app_env = config("app.env");

        $crm_url = config('onebuy.crm_url');
        if($app_env=='demo') {

            $cnv_id = explode('-',$orderPayment['method_title']);
            

            $crm_channel = config('onebuy.crm_channel');

            
            $url = $crm_url."/api/offers/callBack?refer=".$cnv_id[1]."&revenue=".$order->grand_total."&currency_code=".$order->order_currency_code."&channel_id=".$crm_channel."&q_ty=".$q_ty."&email=".$shipping_address->email;
            $res = $this->get_content($url);
            Log::info("post to bm 2 url ".$url." res ".json_encode($res));
            return true;

        }

        try {
            $response = $client->post($shopify['shopify_app_host_name'].'/admin/api/2023-10/orders.json', [
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
            \Nicelizhi\Shopify\Helpers\Utils::send($e->getMessage().'--' .$id. " fix check it ");
            echo $e->getMessage()." post failed";
            //continue;
            return false;
        }

        

        $body = json_decode($response->getBody(), true);
        //Log::info("shopify post order body ". json_encode($pOrder));
        //Log::info("shopify post order".json_encode($body));

        if(isset($body['order']['id'])) {
            $shopifyNewOrder = $this->ShopifyOrder->where([
                'shopify_order_id' => $body['order']['id']
            ])->first();
            if(is_null($shopifyNewOrder)) $shopifyNewOrder = new \Nicelizhi\Shopify\Models\ShopifyOrder();
            $shopifyNewOrder->order_id = $id;
            $shopifyNewOrder->shopify_order_id = $body['order']['id'];
            $shopifyNewOrder->shopify_store_id = $this->shopify_store_id;

            $item = $body['order'];

            $shopifyNewOrder->admin_graphql_api_id = $item['admin_graphql_api_id'];
            $shopifyNewOrder->app_id = $item['app_id'];
            $shopifyNewOrder->browser_ip = $item['browser_ip'];
            $shopifyNewOrder->buyer_accepts_marketing = $item['buyer_accepts_marketing'];
            $shopifyNewOrder->cancel_reason = $item['cancel_reason'];
            $shopifyNewOrder->cancelled_at = $item['cancelled_at'];
            $shopifyNewOrder->cart_token = $item['cart_token'];
            $shopifyNewOrder->checkout_id = $item['checkout_id'];
            $shopifyNewOrder->checkout_token = $item['checkout_token'];
            $shopifyNewOrder->client_details = $item['client_details'];
            $shopifyNewOrder->closed_at = $item['closed_at'];
            $shopifyNewOrder->company = @$item['company'];
            $shopifyNewOrder->confirmation_number = $item['confirmation_number'];
            $shopifyNewOrder->confirmed = $item['confirmed'];
            $shopifyNewOrder->contact_email = $item['contact_email'];
            $shopifyNewOrder->currency = $item['currency'];
            $shopifyNewOrder->current_subtotal_price = $item['current_subtotal_price'];
            $shopifyNewOrder->current_subtotal_price_set = $item['current_subtotal_price_set'];
            $shopifyNewOrder->current_total_additional_fees_set = $item['current_total_additional_fees_set'];
            $shopifyNewOrder->current_total_discounts = $item['current_total_discounts'];
            $shopifyNewOrder->current_total_discounts_set = $item['current_total_discounts_set'];
            $shopifyNewOrder->current_total_duties_set = $item['current_total_duties_set'];
            $shopifyNewOrder->current_total_price = $item['current_total_price'];
            $shopifyNewOrder->current_total_price_set = $item['current_total_price_set'];
            $shopifyNewOrder->current_total_tax = $item['current_total_tax'];
            $shopifyNewOrder->current_total_tax_set = $item['current_total_tax_set'];
            $shopifyNewOrder->customer_locale = $item['customer_locale'];
            $shopifyNewOrder->device_id = $item['device_id'];
            $shopifyNewOrder->discount_codes = $item['discount_codes'];
            $shopifyNewOrder->email = $item['email'];
            $shopifyNewOrder->estimated_taxes = $item['estimated_taxes'];
            $shopifyNewOrder->financial_status = $item['financial_status'];
            $shopifyNewOrder->fulfillment_status = $item['fulfillment_status'];
            $shopifyNewOrder->landing_site = $item['landing_site'];
            $shopifyNewOrder->landing_site_ref = $item['landing_site_ref'];
            $shopifyNewOrder->location_id = $item['location_id'];
            $shopifyNewOrder->merchant_of_record_app_id = $item['merchant_of_record_app_id'];
            $shopifyNewOrder->name = $item['name'];
            $shopifyNewOrder->note = $item['note'];
            $shopifyNewOrder->note_attributes = $item['note_attributes'];
            $shopifyNewOrder->number = $item['number'];
            $shopifyNewOrder->order_number = $item['order_number'];
            $shopifyNewOrder->order_status_url = $item['order_status_url'];
            $shopifyNewOrder->original_total_additional_fees_set = $item['original_total_additional_fees_set'];
            $shopifyNewOrder->original_total_duties_set = $item['original_total_duties_set'];
            $shopifyNewOrder->payment_gateway_names = $item['payment_gateway_names'];
            $shopifyNewOrder->phone = $item['phone'];
            $shopifyNewOrder->po_number = $item['po_number'];
            $shopifyNewOrder->presentment_currency = $item['presentment_currency'];
            $shopifyNewOrder->processed_at = $item['processed_at'];
            $shopifyNewOrder->reference = $item['reference'];
            $shopifyNewOrder->referring_site = $item['referring_site'];
            $shopifyNewOrder->source_identifier = $item['source_identifier'];
            $shopifyNewOrder->source_name = $item['source_name'];
            $shopifyNewOrder->source_url = $item['source_url'];
            $shopifyNewOrder->subtotal_price = $item['subtotal_price'];
            $shopifyNewOrder->subtotal_price_set = $item['subtotal_price_set'];
            $shopifyNewOrder->tags = $item['tags'];
            $shopifyNewOrder->tax_exempt = $item['tax_exempt'];
            $shopifyNewOrder->tax_lines = $item['tax_lines'];
            $shopifyNewOrder->taxes_included = $item['taxes_included'];
            $shopifyNewOrder->test = $item['test'];
            $shopifyNewOrder->token = $item['token'];
            $shopifyNewOrder->total_discounts = $item['total_discounts'];
            $shopifyNewOrder->total_discounts_set = $item['total_discounts_set'];
            $shopifyNewOrder->total_line_items_price = $item['total_line_items_price'];
            $shopifyNewOrder->total_line_items_price_set = $item['total_line_items_price_set'];
            $shopifyNewOrder->total_outstanding = $item['total_outstanding'];
            $shopifyNewOrder->total_price = $item['total_price'];
            $shopifyNewOrder->total_price_set = $item['total_price_set'];
            
            $shopifyNewOrder->total_shipping_price_set = $item['total_shipping_price_set'];
            $shopifyNewOrder->total_tax = $item['total_tax'];
            $shopifyNewOrder->total_tax_set = $item['total_tax_set'];
            $shopifyNewOrder->total_tip_received = $item['total_tip_received'];
            $shopifyNewOrder->total_weight = $item['total_weight'];
            $shopifyNewOrder->user_id = $item['user_id'];
            $shopifyNewOrder->billing_address = $item['billing_address'];
            $shopifyNewOrder->customer = $item['customer'];
            $shopifyNewOrder->discount_applications = $item['discount_applications'];
            $shopifyNewOrder->fulfillments = $item['fulfillments'];
            $shopifyNewOrder->line_items = $item['line_items'];
            $shopifyNewOrder->payment_terms = $item['payment_terms'];
            $shopifyNewOrder->refunds = $item['refunds'];
            $shopifyNewOrder->shipping_address = $item['shipping_address'];
            $shopifyNewOrder->shipping_lines = $item['shipping_lines'];

            $shopifyNewOrder->save();

            // order sync to other job

            $cnv_id = explode('-',$orderPayment['method_title']);


            $crm_channel = config('onebuy.crm_channel');

            
            $url = $crm_url."/api/offers/callBack?refer=".$cnv_id[1]."&revenue=".$order->grand_total."&currency_code=".$order->order_currency_code."&channel_id=".$crm_channel."&q_ty=".$q_ty."&email=".$item['email'];
            $res = $this->get_content($url);
            Log::info("post to bm 2 url ".$url." res ".json_encode($res));

        }

        echo $id." end post \r\n";
    }

    private function get_content($URL){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function createCuster($data) {
        $password = rand(100000, 10000000);
        Event::dispatch('customer.registration.before');

        $data = array_merge($data, [
            'password'    => bcrypt($password),
            'is_verified' => 1,
            'subscribed_to_news_letter' => 1,
        ]);

        $this->customerRepository->create($data);
    }
    
}
