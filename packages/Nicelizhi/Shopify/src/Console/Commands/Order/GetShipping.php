<?php

namespace Nicelizhi\Shopify\Console\Commands\Order;

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


class GetShipping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:order:get:shipped {--shopify_store_id=} {--force=} {--ids=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Order List';

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
        $this->shopify_store_id = "wmshoe";
        $this->shopify_store_id = "hatmeo";
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
        
        $shopify_store_id = $this->option('shopify_store_id');
        $force = $this->option('force');
        if(!empty($shopify_store_id)) $this->shopify_store_id = $shopify_store_id;

        Log::info($this->shopify_store_id." start sync orders");

        $ids = $this->option('ids');

        if ($force) {

            $this->error('Start sync order from Shopify Store '. $this->shopify_store_id);

            $client = new Client();

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
            /**
             * 
             * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/order#get-orders?status=any
             * 
             */
            
             $items = Order::where(['status'=>'processing'])->select(['id'])->limit(150)->get();
             $ids = "0";
             foreach($items as $key=>$item) {
                $shopOrder = \Nicelizhi\Shopify\Models\ShopifyOrder::where("shopify_store_id", $this->shopify_store_id)->select(['shopify_order_id'])->where("order_id", $item->id)->first();
                $ids.=",".$shopOrder->shopify_order_id;
                //var_dump($shopOrder);
                //exit;
             }

             //var_dump($ids);exit;

            $url = "";

            if(!empty($ids)) {
                $url.="&ids=".$ids;
            }

            // 5585627676902
            $base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/orders.json?status=any&fulfillment_status=shipped&limit=250'.$url;
            $this->error("base url ". $base_url);
            //$base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/orders.json?fulfillment_status=unshipped&limit=250';
            //$base_url = $shopify['shopify_app_host_name'].'/admin/api/2023-10/orders.json?ids=5585627676902';
            $response = $client->get($base_url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
                ]
            ]);

            $body = json_decode($response->getBody(), true);
            //var_dump($body);

            $body = $response->getBody();
            $body = json_decode($body, true);
            //var_dump($body);
            $i = 1;
            foreach($body['orders'] as $key=>$item) {

                $this->info("sync...-".$i."-".$item['id']);

                //var_dump($item);
                
                $shopifyNewOrder = $this->ShopifyOrder->where([
                    'shopify_store_id' => $this->shopify_store_id,
                    'shopify_order_id' => $item['id']
                ])->first();
                
                if(is_null($shopifyNewOrder)) {
                    $shopifyNewOrder = new \Nicelizhi\Shopify\Models\ShopifyOrder();
                    $shopifyNewOrder->order_id = 0;
                    //continue;
                } 
                
                $shopifyNewOrder->shopify_order_id = $item['id'];
                $shopifyNewOrder->shopify_store_id = $this->shopify_store_id;
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


                if($item['fulfillment_status']=='fulfilled' && $shopifyNewOrder->order_id!=0) {

                    $orderId = $shopifyNewOrder->order_id;
                    $this->info("shipping order id ". $orderId);
                    $order = $this->orderRepository->findOrFail($orderId);
                    //var_dump($order);
                    if (!$order->canShip()) {
                        $this->error($orderId.'---'.trans('admin::app.sales.shipments.create.order-error'));
                        $shipments = $this->shipmentRepository->where('order_id', $order->id)->first();
                        
                        if (isset($shipments) && $order->status=="processing") {
                            echo "completed \r\n";
                            $this->orderRepository->updateOrderStatus($order, 'completed');
                        } 

                        $i++;
                        continue;
                    }

                    /**
                     * 
                     * 
                     *  shipment[carrier_title]: CNE Express
                     *  shipment[track_number]: 3A5V649727570
                     *  shipment[source]: 1
                     *  shipment[items][2589][1]: 1
                     *  shipment[items][2591][1]: 1
                     *  shipment[items][2593][1]: 1
                     *  shipment[items][2595][1]: 1
                     * 
                     * 
                     */
                    $shipment = [];
                    $shipment['carrier_title'] = $item['fulfillments'][0]['tracking_company'];
                    $shipment['track_number'] = $item['fulfillments'][0]['tracking_number'];
                    $shipment['source'] = 1;

                    $products = $order->items;

                    //var_dump($products);

                    $line_items = [];

                    foreach($products as $key=>$product) {
                        $sku = $product['additional'];

                        //var_dump($sku);
            
                        $skuInfo = explode('-', $sku['product_sku']);
                        if(!isset($skuInfo[1])) {
                            $this->error("have error" . $item['id']);
                            return false;
                        }
            
                        $line_item = [];
                        $line_item['variant_id'] = $skuInfo[1];
                        $line_item ['quantity'] = $product['qty_ordered'];
                        //$line_item ['requires_shipping'] = true;
                        //$line_item['item_id'] = $sku['variant_id'];
                        $line_item['order_item_id'] = $product['id'];

                        $line_items[$skuInfo[1]] = $line_item;
            
                        //array_push($line_items, $line_item);
                    }

                    //var_dump($line_items);exit;

                    // 获取已经发货的数据内容
                    $shipment_items = [];
                    foreach($item['fulfillments'][0]['line_items'] as $key=>$line_item) {
                        //var_dump($line_item['variant_id'],$line_item['quantity'], $line_items[$line_item['variant_id']]);
                        if(isset($line_items[$line_item['variant_id']])) {
                            if($line_items[$line_item['variant_id']]['quantity']==$line_item['quantity']) {
                                $shipment_item = [];
                                $shipment_items[$line_items[$line_item['variant_id']]['order_item_id']][1] = $line_item['quantity'];
                                //array_push($shipment_items, $shipment_item);
                                //$shipment_items[] = $shipment_item;
                            }
                        }
                    }

                    //var_dump($shipment_items);exit;

                    $shipment['items'] = $shipment_items;
                    //var_dump($line_items, $shipment_items, $shipment);

                    $data = [];
                    //$data['shipment']
                    $data['shipment'] = $shipment;

                    $response = $this->shipmentRepository->create(array_merge($data, [
                        'order_id' => $orderId,
                    ]));

                    



                }
                // 5594243432678
                // todo
                if($item['fulfillment_status']=='restocked' && $shopifyNewOrder->order_id!=0) { //restocked

                    $orderId = $shopifyNewOrder->order_id;
                    $result = $this->orderRepository->cancel($orderId);
                    $this->error($orderId. " cancel ". $result);
                }

                sleep(2);

                $i++;
            }            
        }
    }
}
