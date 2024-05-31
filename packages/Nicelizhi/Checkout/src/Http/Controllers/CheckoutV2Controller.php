<?php
namespace Nicelizhi\Checkout\Http\Controllers;

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
use Webkul\Payment\Facades\Payment;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Product\Helpers\View;
use Nicelizhi\Airwallex\Payment\Airwallex;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Webkul\CMS\Repositories\CmsRepository;
use Illuminate\Support\Facades\Redis;
use Webkul\Sales\Repositories\OrderTransactionRepository;


class CheckoutV2Controller extends Controller{

    private $cache_prefix_key = "checkout_v1_";
    private $cache_ttl = "360000";
    private $view_prefix_key = "checkoutv2";

    private $faq_cache_key = "faq";

      /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Paypal\Helpers\Ipn  $ipnHelper
     * @return void
     */
    public function __construct(
        protected SmartButton $smartButton,
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected AttributeRepository $attributeRepository,
        protected OrderRepository $orderRepository,
        protected InvoiceRepository $invoiceRepository,
        protected Airwallex $airwallex,
        protected CmsRepository $cmsRepository,
        protected OrderTransactionRepository $orderTransactionRepository,
        protected ThemeCustomizationRepository $themeCustomizationRepository
    )
    {
    }

    /**
     * Show product or category view. If neither category nor product matches, abort with code 404.
     *
     * @return \Illuminate\View\View|\Exception
     */
    public function detail($slug, Request $request) {
        $slugOrPath = $slug;
        $cache_key = "product_url_".$slugOrPath;
        $product = Cache::get($cache_key);
        if(empty($product)) {
            $product = $this->productRepository->findBySlug($slugOrPath);
            Cache::put($cache_key, $product);
        }

        $refer = $request->input("refer");

        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
        }else{
            $refer = $request->session()->get('refer');
        }
        
        //var_dump($slug);

        //$slug = $slug;
        $redis = Redis::connection('default');


        $faqItems = $redis->hgetall($this->faq_cache_key);
        ksort($faqItems);
        $comments = $redis->hgetall($this->cache_prefix_key."product_comments_".$product['id']);
        $default_country = config('onebuy.default_country');
        $payments = config('onebuy.payments'); // config the payments status
        $payments_default = config('onebuy.payments_default');

        return view('checkout::product-detail-'.$this->view_prefix_key, compact('slug','comments','faqItems','product','default_country',"payments","payments_default"));
    }


   




}