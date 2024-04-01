<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Nicelizhi\Shopify\Models\ShopifyProduct;
use Nicelizhi\Shopify\Models\ShopifyOrder;
//use Nicelizhi\Shopify\Repositories\ProductRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        protected ShipmentRepository $shipmentRepository,
    )
    {
        $this->shopify_store_id = config('shopify.shopify_store_id');
        $this->lang = config('shopify.store_lang');
        $this->category_id = 9;
    }

    public function v1(Request $request) {
        # The Shopify app's client secret, viewable from the Partner Dashboard. In a production environment, set the client secret as an environment variable to prevent exposing it in code.
        Log::info("webhook ".json_encode($request->all()));

    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_updated(Request $request) {
        Log::info("orders_updated ".json_encode($request->all()));
    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_create(Request $request) {
        Log::info("orders_create ".json_encode($request->all()));
    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_fulfilled(Request $request) {
        Log::info("orders_fulfilled ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_edited(Request $request) {
        Log::info("orders_edited ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_paid(Request $request) {
        Log::info("orders_paid ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function order_transactions_create(Request $request) {
        Log::info("order_transactions_create ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function customers_create(Request $request) {
        Log::info("customers_create ".json_encode($request->all()));
    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function customers_update(Request $request) {
        Log::info("customers_update ".json_encode($request->all()));
    }

    public function fulfillments_create(Request $request) {
        Log::info("fulfillments_create ".json_encode($request->all()));
        $req = $request->all();

        $shopify_order_id = $req['order_id'];

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

        //var_dump($products);

        $line_items = [];

        foreach($products as $key=>$product) {
            $sku = $product['additional'];

            //var_dump($sku);

            $skuInfo = explode('-', $sku['product_sku']);
            //var_dump($skuInfo);
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

        // 获取已经发货的数据内容
        $shipment_items = [];
        foreach($req['line_items'] as $key=>$line_item) {
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

        //var_dump($data);exit;

        $response = $this->shipmentRepository->create(array_merge($data, [
            'order_id' => $shopifyNewOrder->order_id,
        ]));
        
        
        

    }

    public function fulfillments_update(Request $request) {
        Log::info("fulfillments_update ".json_encode($request->all()));
    }

    public function refunds_create(Request $request) {
        Log::info("refunds_create ".json_encode($request->all()));
    }

    public function products_create(Request $request) {
        Log::info("products_create ".json_encode($request->all()));
    }

    public function products_delete(Request $request) {
        Log::info("products_delete ".json_encode($request->all()));
    }

    public function products_update(Request $request) {
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
        $product->published_at = $req['published_at'];
        $product->template_suffix = $req['template_suffix'];
        $product->published_scope = $req['published_scope'];
        $product->tags = $req['tags'];
        $product->status = $req['status'];
        $product->admin_graphql_api_id = $req['admin_graphql_api_id'];
        $product->variants = $req['variants'];
        $product->options = $req['options'];
        $product->images = $req['images'];

        $product->save();

        //update the local data




    }

}