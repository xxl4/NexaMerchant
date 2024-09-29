<?php

namespace Nicelizhi\Shopify\Console\Commands\Refund;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Repositories\RefundRepository;

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
        protected RefundRepository $refundRepository
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

        $shopify = $shopifyStore->toArray();

        

        $order_id = $this->option("order_id");
        $refund_id = $this->option("refund_id");

        //search shopify order
        // $shopifyOrder = $this->ShopifyOrder->where("shopify_store_id", $this->shopify_store_id)->where("order_id", $order_id)->first();
        // if(is_null($shopifyOrder)) {
        //     $this->error("no order". $order_id);
        //     return false;
        // }

        // $shopifyOrderLineItem = $shopifyOrder->line_items;

        //var_dump($shopifyOrderLineItem);exit;

        // find the refund order
        $refundOrder = $this->refundRepository->findOrFail($refund_id);
	if(is_null($refundOrder)) {
		return false;
	}
        //var_dump($refundOrder);exit;

        //@link https://shopify.dev/docs/api/admin-rest/2024-01/resources/refund#post-orders-order-id-refunds

        //var_dump($order_id, $refund_id, $shopifyOrder);

        $params = [];

        $refund = [];

        $transactions = [];

        $total_unsettled_set = [
            'shop_money' => [
                "amount" => $refundOrder->grand_total,
                "currency_code" => $refundOrder->order_currency_code,
            ],
            'presentment_money' => [
                "amount" => $refundOrder->grand_total,
                "currency_code" => $refundOrder->order_currency_code,
            ]
        ];

        $transactions = [
           // 'order_id' => $shopifyOrder->shopify_order_id,
            'amount'    => $refundOrder->grand_total,
            'currency'  => $refundOrder->order_currency_code,
            "kind" => "void",
            "gateway" => "exchange-credit",
            "status"    => "success",
            // "total_unsettled_set" => $total_unsettled_set
        ];
        





       // $refund['order_id'] = $shopifyOrder->shopify_order_id;
        $refund['id'] = $refund_id;

       //$refund['transactions'][] = $transactions;

        $products = $refundOrder->items;

        //$line_items = [];
        $q_ty = 0;
        $refund_line_items = [];
        foreach($products as $key=>$product) {

            //var_dump($product);

            $sku = $product['additional'];

            $skuInfo = explode('-', $sku['product_sku']);
            if(!isset($skuInfo[1])) {
                $this->error("have error" . $id);
                return false;
            }

            $line_item = [];
            //$line_item['variant_id'] = $skuInfo[1];
            //$line_item['id'] = "14025465331942";
            $line_item['line_item_id'] = "14025465331942";
            $line_item['location_id'] = NULL;
            //$line_item ['quantity'] = $product['qty'];
            $line_item ['restock_type'] = "cancel";
            $line_item ['subtotal'] = $product->total;

            $line_item_small = [];

            $line_item_small = [
                "variant_id" => $skuInfo[1],
                'quantity' => $product['qty'],
                "price" => $product->total
            ];

            $line_item['line_item'] = $line_item_small;


            $subtotal_set = [
                'shop_money' => [
                    "amount" => $product->total,
                    "currency_code" => $refundOrder->order_currency_code,
                ],
                'presentment_money' => [
                    "amount" => $product->total,
                    "currency_code" => $refundOrder->order_currency_code,
                ]
            ];

            $line_item['subtotal_set'] = $subtotal_set;
            $q_ty += $product['qty'];
            //$line_item ['requires_shipping'] = true;

            array_push($refund_line_items, $line_item);
        }

        //var_dump($refund_line_items);exit;

        $refund['refund_line_items'] = $refund_line_items;

        $refund['notify'] = false;
        $refund['currency'] = $refundOrder->order_currency_code;
        $refund['note'] = " refund";
        //$refund['restock'] = true;
        $refund['restock_type'] = true;
        // $refund['return'] = null;
        //$refund['user_id'] = 0;

        $shipping = [];
        $shipping = [
            'full_refund' => true
            //'amount' => $refundOrder->shipping_amount
        ];
        $refund['shipping'] = $shipping;



        $params['refund'] = $refund;
        
        

        //var_dump($params);exit;

        $orderPayment = $refundOrder->order->payment;

        $cnv_id = explode('-',$orderPayment['method_title']);

        //var_dump($cnv_id);
        $crm_channel = config('onebuy.crm_channel');

        // order/refund
        

        //$client = new Client();

        //var_dump($params);

        
        
        // $response = $client->post($shopify['shopify_app_host_name'].'/admin/api/2023-10/orders/'.$shopifyOrder->shopify_order_id.'/refunds.json', [
        //     'http_errors' => true,
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //         'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
        //     ],
        //     'body' => json_encode($params)
        // ]);
        

        //var_dump($response);
        //exit;

        $crm_url = config('onebuy.crm_url');

        $url = $crm_url."/api/order/refund?token=".$cnv_id[1]."&refund_amount=".$refundOrder->grand_total."&currency_code=".$refundOrder->order_currency_code."&channel_id=".$crm_channel."&q_ty=".$q_ty."&refund_id=".$refundOrder->id."&order_id=".$refundOrder->order_id;
        echo $url."\r\n";
        $res = $this->get_content($url);

        Log::info("post to bm 2 url ".$url." res ".json_encode($res));
        
        

        //exit;

       

        






        
    }

    private function get_content($URL){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    
}
