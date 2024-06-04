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


class ApiController extends Controller
{

    private $faq_cache_key = "faq";

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
        
    }

    /**
     * 
     * 
     * faq interface
     * 
     * 
     */

    public function ShopifyImages($product_id) {

        $shopifyProductImages = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->select(['images'])->first();
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

}