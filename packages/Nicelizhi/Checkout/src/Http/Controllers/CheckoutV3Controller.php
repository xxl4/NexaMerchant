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


class CheckoutV3Controller extends Controller{

    private $cache_prefix_key = "checkout_v1_";
    private $cache_ttl = "360000";
    private $view_prefix_key = "checkoutv3";

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

        // $comments = Cache::remember('product_review'.$product['id'], 36000, function ($product) {
        //     $comments = $product->reviews->where('status', 'approved')->take(10);
        //     $comments = $comments->map(function($comments) {
        //         $comments->customer = $comments->customer;
        //         $comments->images;
        //         return $comments;
        //     });
        //     return $comments;
        // });
        //$comments = [];

        //var_dump($comments);exit;

        $default_country = config('onebuy.default_country');
        $payments = config('onebuy.payments'); // config the payments status
        $payments_default = config('onebuy.payments_default');

        $crm_channel = config('onebuy.crm_channel');

        $gtag = config('onebuy.gtag');

        $gtm = config('onebuy.gtm');

        $data = $this->ProductDetail($slug);

        return view('checkout::product-detail-'.$this->view_prefix_key, compact('slug','comments','faqItems','product','default_country',"payments","payments_default","refer","crm_channel","data","gtag","gtm"));
    }


   
    public function ProductDetail($slug) {
        $currency = core()->getCurrentCurrencyCode();
        $data = Cache::get($this->checkout_v2_cache_key.$slug.'_'.$currency);
        $env = config("app.env");
        // when the env is pord use cache
        if(empty($data)) {
        //if(true) {
            $product = $this->productRepository->findBySlug($slug);
            $data = [];
            $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
            $attributes = $productViewHelper->getConfigurationConfig($product);

    
            $redis = Redis::connection('default');
    
            foreach($attributes['attributes'] as $key=>$attribute) {

                $product_attr_sort_cache_key = "product_attr_sort_".$attribute['id']."_".$product->id;
                $product_attr_sort = $redis->hgetall($product_attr_sort_cache_key); // get sku sort
                $attributes['attributes'][$key]['attr_sort'] = $product_attr_sort;
            }

            foreach($attributes['index'] as $key=>$index) {
                
                $sku_products = $this->productRepository->where("id", $key)->select(['sku'])->first();
                $attributes['index'][$key]['sku'] = $sku_products->sku;
                $index2 = "";
                $total = count($index);
                $i = 0;
                foreach($index as $key2=>$ind) {
                    $i++;
                    if(empty($index2)) {
                        $index2=$key2."_".$ind;
                    } else {
                        $index2=$index2.",".$key2."_".$ind;
                    }
                    if($i==$total) $attributes['index2'][$index2] = [$key,$sku_products->sku];
                }
                //var_dump($index);

            }
    
            $package_products = [];
            $package_products = \Nicelizhi\OneBuy\Helpers\Utils::makeProducts($product, [2,1,3,4]);
            $product = new ProductResource($product);
            $data['product'] = $product;
            $data['package_products'] = $package_products;
            $data['sku'] = $product->sku;
            $data['attr'] = $attributes;
    
            $countries = config("countries");
    
            $default_country = config('onebuy.default_country');
    
            $airwallex_method = config('onebuy.airwallex.method');
    
            $payments = config('onebuy.payments'); // config the payments status
    
            $payments_default = config('onebuy.payments_default');
            $brand = config('onebuy.brand');
    
            $gtag = config('onebuy.gtag');
    
            $fb_ids = config('onebuy.fb_ids');
            $ob_adv_id = config('onebuy.ob_adv_id');
    
            $crm_channel = config('onebuy.crm_channel');
    
            $quora_adv_id = config('onebuy.quora_adv_id');
    
            $paypal_client_id = core()->getConfigData('sales.payment_methods.paypal_smart_button.client_id');
    
            $data['countries'] = $countries;
            $data['default_country'] = $default_country;
            $data['airwallex_method'] = $airwallex_method;
            $data['payments'] = $payments;
            $data['payments_default'] = $payments_default;
            $data['brand'] = $brand;
            $data['gtag'] = $gtag;
            $data['fb_ids'] = $fb_ids;
            $data['ob_adv_id'] = $ob_adv_id;
            $data['crm_channel'] = $crm_channel;
            $data['quora_adv_id'] = $quora_adv_id;
            $data['paypal_client_id'] = $paypal_client_id;
            $data['env'] = config("app.env");
            $data['sellPoints'] = $redis->hgetall("sell_points_".$slug);
    
            $ads = []; // add ads
            
            $productBgAttribute = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 29,
            ]);
    
    
            $productBgAttribute_mobile = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 30,
            ]);
    
            $productSizeImage = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 32,
            ]);
    
            $ads['pc']['img'] = isset($productBgAttribute->text_value) ? config("app.url").'/storage/'.$productBgAttribute->text_value : config("app.url")."/checkout/onebuy/banners/".$default_country."_pc.jpg";
            $ads['mobile']['img'] = isset($productBgAttribute_mobile->text_value) ? config("app.url").'/storage/'.$productBgAttribute_mobile->text_value : config("app.url")."/checkout/onebuy/banners/".$default_country."_mobile.jpg";
            $ads['size']['img'] = isset($productSizeImage->text_value) ? config("app.url").'/storage/'.$productSizeImage->text_value : "";
    
            $data['ads'] = $ads;

            Cache::put($this->checkout_v2_cache_key.$slug, json_encode($data));

            return $data;

        }else{
            return json_decode($data,true);
        }




    }



}