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


class CheckoutV4Controller extends Controller{

    private $cache_prefix_key = "checkout_v1_";
    private $cache_ttl = "360000";
    private $view_prefix_key = "checkoutv4";

    private $checkout_v2_cache_key = "checkout_v2_";

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
        $currency = core()->getCurrentCurrencyCode();
        $cache_key = "product_url_".$slugOrPath."_".$currency;
        $product = Cache::get($cache_key);
        if(empty($product)) {
            $product = $this->productRepository->findBySlug($slugOrPath);
            Cache::put($cache_key, $product);
        }
        if (
            ! $product
            || ! $product->visible_individually
            || ! $product->url_key
            || ! $product->status
        ) {
            abort(404);
        }

        $refer = $request->input("refer");

        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
            $request->session()->put('refer_'.$slug, $refer);
        }else{
            $refer = $request->session()->get('refer');
        }
        
        //var_dump($slug);

        //$slug = $slug;
        $redis = Redis::connection('default');


        $faqItems = $redis->hgetall($this->faq_cache_key);
        ksort($faqItems);
        //$comments = $redis->hgetall($this->cache_prefix_key."product_comments_".$product['id']);


        $comments = Cache::get("product_comment_".$product['id']);
        if(empty($comments)) {

            $comments = \Webkul\Product\Models\ProductReview::where("status","approved")->where("product_id", $product['id'])->orderBy("sort","desc")->limit(10)->get();

            $comments = $comments->map(function($comments) {
                $comments->customer = $comments->customer;
                $comments->images;
                return $comments;
            });

            //var_dump($comments);
            Cache::set("product_comment_".$product['id'], $comments, 36000);


        }


        $default_country = config('onebuy.default_country');
        $payments = config('onebuy.payments'); // config the payments status
        $payments_default = config('onebuy.payments_default');

        $crm_channel = config('onebuy.crm_channel');

        $checkoutHelper = new \Nicelizhi\Checkout\Helper\Checkout();

        $data = $checkoutHelper->ProductDetail($slug);

        $upselling_enable = config('Upselling.enable');

        $paypal_rt = config('onebuy.paypal_rt');


        $paypal_id_token = $request->session()->get('paypal_id_token');
        if(empty($paypal_id_token)) {
            $paypal_id_token = $this->smartButton->getIDAccessToken();
            $paypal_access_token = $paypal_id_token->result->access_token;
            $paypal_id_token = $paypal_id_token->result->id_token;

            
            
            $request->session()->put('paypal_id_token', $paypal_id_token);
            $request->session()->put('paypal_access_token', $paypal_access_token);
        }

        $paypal_vault = $request->session()->get('paypal_vault'); // get the paypal vault

        // enable the upselling
        if($upselling_enable) {
            $request->session()->put('upselling_enable', $upselling_enable); // control the page enable the upselling
        }
        

        return view('checkout::product-detail-'.$this->view_prefix_key, compact('slug','comments','faqItems','product','default_country',"payments","payments_default","refer","crm_channel","data","paypal_rt","paypal_id_token","paypal_vault"));
    }


   
    



}
