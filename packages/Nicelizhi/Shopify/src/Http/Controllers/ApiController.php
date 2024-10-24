<?php
namespace Nicelizhi\Shopify\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Shop\Http\Resources\CartResource;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Shop\Http\Resources\ProductResource;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Product\Helpers\View;
use Nicelizhi\Airwallex\Payment\Airwallex;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Webkul\Payment\Facades\Payment;
use Illuminate\Support\Facades\Redis;
use Webkul\CMS\Repositories\CmsRepository;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Illuminate\Http\Response;
use Webkul\CartRule\Repositories\CartRuleRepository;
use Nicelizhi\Shopify\Http\Responses\XmlResponse;
use Nicelizhi\Shopify\Models\ShopifyStore;



class ApiController extends Controller
{

    private $faq_cache_key = "faq";

    private $ShopifyStore;

    private $shopify_store_id;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Paypal\Helpers\Ipn  $ipnHelper
     * @return void
     */
    public function __construct(
    )
    {
        //XmlResponse::macro();
        $this->ShopifyStore = new ShopifyStore();

        $this->shopify_store_id = config('shopify.shopify_store_id');
    }

    /**
     * 
     * 
     * shopify images
     * @param int $product_id
     * @return \Illuminate\Http\JsonResponse
     * 
     * 
     */

    public function ShopifyImages($product_id) {
        $shopifyProductImages = Cache::get("shopify_images_".$product_id);
        if(empty($shopifyProductImages)) {
            $shopifyProductImages = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->select(['images'])->first();
            Cache::set("shopify_images_".$product_id, $shopifyProductImages);
        }
        
        if(is_null($shopifyProductImages)) {
            return response()->json([
                "code" => 404,
                "message" => "product images not found"
            ], 404);
        } 
        return response()->json([
            'data' => $shopifyProductImages,
            'code' => 200,
            'message' => 'success'
        ], 200);
        
    }

    /**
     * 
     * 
     * shopify full
     * @param int $product_id
     * @return \Illuminate\Http\JsonResponse
     * 
     * 
     */

    public function ShopifyFull($product_id) {
        $shopifyProduct = Cache::get("shopify_full_".$product_id);
        if(empty($shopifyProduct)) {
            $shopifyProduct = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->first();
            Cache::set("shopify_full_".$product_id, $shopifyProduct);
        }
        
        if(is_null($shopifyProduct)) {
            return response()->json([
                "code" => 404,
                "message" => "product not found"
            ], 404);
        } 

        $redis = Redis::connection('default');

        // get product sell points
        $shopifyProduct->sellPoints = $redis->hgetall("sell_points_".$product_id);

        return response()->json([
            'data' => $shopifyProduct,
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    // generate the shopify product feeds
    public function feeds() {

        // get default shopify

        $shopifyStore = Cache::get("shopify_store_".$this->shopify_store_id);

        if(empty($shopifyStore)){
            $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $this->shopify_store_id)->first();
            Cache::put("shopify_store_".$this->shopify_store_id, $shopifyStore, 3600);
        }

        // add cache for the products

        $products = Cache::get("shopify_products_".$this->shopify_store_id);

        if(empty($products)) {
            $shopifyProducts = \Nicelizhi\Shopify\Models\ShopifyProduct::where("status","active")->where("shopify_store_id", $shopifyStore->shopify_store_id)->select(['product_id',"title","handle","variants","images"])->get()->toArray();;
            $products = [];

            foreach($shopifyProducts as $product) {
                $product['url'] = $shopifyStore->shopify_app_host_name."/products/".$product['handle'];
                $products[] = $product;
            }
            Cache::put("shopify_products_".$this->shopify_store_id, $products, 3600);
        }
        //return response()->xml($shopifyProducts, $httpCode, $headers, $rootXmlTag);
        
        return response()->json([
            'data' => $products,
            'code' => 200,
            'message' => 'success'
        ], 200);
    }



}