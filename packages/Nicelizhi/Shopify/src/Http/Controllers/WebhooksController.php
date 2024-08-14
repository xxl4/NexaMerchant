<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Attribute\Models\AttributeOptionTranslation;
use Nicelizhi\Shopify\Models\ShopifyProduct;
use Nicelizhi\Shopify\Models\ShopifyOrder;
//use Nicelizhi\Shopify\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class WebhooksController extends Controller
{

    private $shopify_store_id = null;

    private $lang = null;

    private $category_id = null;

    private $locales = null;

    

    public function __construct(
        protected OrderRepository $orderRepository,
        protected ShopifyOrder $ShopifyOrder,
        protected ShopifyProduct $shopifyProduct,
        protected ProductRepository $productRepository,
        protected ShipmentRepository $shipmentRepository,
    )
    {
        $this->shopify_store_id = config('shopify.shopify_store_id');
        $this->lang = config('shopify.store_lang');
        $this->category_id = 9;
    }

    public function v1(Request $request) {
        # The Shopify app's client secret, viewable from the Partner Dashboard. In a production environment, set the client secret as an environment variable to prevent exposing it in code.
        //Log::info("webhook ".json_encode($request->all()));

    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_updated(Request $request) {
        //Log::info("orders_updated ".json_encode($request->all()));

        $req = $request->all();

        $shopify_order_id = $req['id'];

        $shopifyNewOrder = $this->ShopifyOrder->where([
            'shopify_store_id' => $this->shopify_store_id,
            'shopify_order_id' => $shopify_order_id
        ])->select(['order_id'])->first();

        if(is_null($shopifyNewOrder)) {
            Log::error("orders_updated ".$shopify_order_id);
            return false;
        }

        $item = $req;

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



    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_create(Request $request) {
        //Log::info("orders_create ".json_encode($request->all()));

        

    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_fulfilled(Request $request) {
        //Log::info("orders_fulfilled ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_edited(Request $request) {
        //Log::info("orders_edited ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_paid(Request $request) {
        //Log::info("orders_paid ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function order_transactions_create(Request $request) {
       // Log::info("order_transactions_create ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function customers_create(Request $request) {
        //Log::info("customers_create ".json_encode($request->all()));
    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function customers_update(Request $request) {
        //Log::info("customers_update ".json_encode($request->all()));
    }

    public function fulfillments_create(Request $request) {
        Log::info("fulfillments_create ".json_encode($request->all()));

        $req = $request->all();
        $shopify_order_id = $req['order_id'];

        

        Artisan::queue("shopify:fulfillments:create", ['--order_id'=>$shopify_order_id,'--data'=> $req])->onConnection('redis')->onQueue('shopify-fulfillments')->delay(Carbon::now()->addMinutes(60)); // add shopify fulfillments queue
        return true;

        $shopifyNewOrder = $this->ShopifyOrder->where([
            'shopify_store_id' => $this->shopify_store_id,
            'shopify_order_id' => $shopify_order_id
        ])->select(['order_id'])->first();

        if(is_null($shopifyNewOrder)) {
            Log::error("fulfillments_create ".$shopify_order_id);
            return false;
        }

        $order = $this->orderRepository->findOrFail($shopifyNewOrder->order_id);

        if (!$order->canShip()) {
            Log::error("fulfillments_create cannot ship ".$shopify_order_id);
            return false;
        }

        // search local order_id and check it can send shippment

        $shipment = [];
        $shipment['carrier_title'] = $req['tracking_company'];
        $shipment['track_number'] = $req['tracking_number'];
        $shipment['source'] = 1;

        $products = $order->items;


        $line_items = [];

        foreach($products as $key=>$product) {
            $sku = $product['additional'];
            $skuInfo = explode('-', $sku['product_sku']);
            if(!isset($skuInfo[1])) {
                $this->error("have error");
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

        
        $shipment_items = [];
        foreach($req['line_items'] as $key=>$line_item) {
            if(isset($line_items[$line_item['variant_id']])) {
                if($line_items[$line_item['variant_id']]['quantity']==$line_item['quantity']) {
                    $shipment_item = [];
                    $shipment_items[$line_items[$line_item['variant_id']]['order_item_id']][1] = $line_item['quantity'];
                }
            }
        }

        //var_dump($shipment_items);exit;

        $shipment['items'] = $shipment_items;

        $data = [];
        $data['shipment'] = $shipment;


        $response = $this->shipmentRepository->create(array_merge($data, [
            'order_id' => $shopifyNewOrder->order_id,
        ]));
        
    }

    public function fulfillments_update(Request $request) {
        //Log::info("fulfillments_update ".json_encode($request->all()));
    }

    public function refunds_create(Request $request) {
        //Log::info("refunds_create ".json_encode($request->all()));
    }

    public function products_create(Request $request) {
        //Log::info("products_create ".json_encode($request->all()));

        $req = $request->all();
        
        $product_id = $req['id'];

        // check the product id is have
        $product = $this->shopifyProduct->where("product_id", $product_id)->first();

        if(is_null($product)) $product = new ShopifyProduct();

        // locales
        $this->locales = core()->getAllLocales()->pluck('code')->toArray();

        $product->shopify_store_id = $this->shopify_store_id;
        $product->product_id = $product_id;
        $product->title = $req['title'];
        $product->product_type = $req['product_type'];
        $product->body_html = $req['body_html'];
        $product->vendor = $req['vendor'];
        $product->handle = $req['handle'];
        $product->published_at = "";
        if(isset($req['published_at'])) $product->published_at = $req['published_at'];
        $product->template_suffix = (string)$req['template_suffix'];
        $product->published_scope = $req['published_scope'];
        $product->tags = $req['tags'];
        $product->status = $req['status'];
        $product->admin_graphql_api_id = $req['admin_graphql_api_id'];
        $product->variants = $req['variants'];
        $product->options = $req['options'];
        $product->images = $req['images'];

        $product->save();

        return true;

        // check local product

    }

    public function products_delete(Request $request) {
        //Log::info("products_delete ".json_encode($request->all()));
    }

    public function products_update(Request $request) {

        //Log::info("products_update ".json_encode($request->all()));

        $req = $request->all();
        
        $product_id = $req['id'];

        // check the product id is have
        $product = $this->shopifyProduct->where("product_id", $product_id)->first();

        if(is_null($product)) $product = new ShopifyProduct();

        // locales
        $this->locales = core()->getAllLocales()->pluck('code')->toArray();

        $product->shopify_store_id = $this->shopify_store_id;
        $product->product_id = $product_id;
        $product->title = $req['title'];
        $product->product_type = $req['product_type'];
        $product->body_html = $req['body_html'];
        $product->vendor = $req['vendor'];
        $product->handle = $req['handle'];
        $product->published_at = "";
        if(isset($req['published_at'])) $product->published_at = $req['published_at'];
        $product->template_suffix = (string)$req['template_suffix'];
        $product->published_scope = $req['published_scope'];
        $product->tags = $req['tags'];
        $product->status = $req['status'];
        $product->admin_graphql_api_id = $req['admin_graphql_api_id'];
        $product->variants = $req['variants'];
        $product->options = $req['options'];
        $product->images = $req['images'];

        $product->save();

        Cache::pull("shopify_images_".$product_id); // delete the cache
        Cache::pull("shopify_full_".$product_id); // delete the cache

        return true;
    }

}