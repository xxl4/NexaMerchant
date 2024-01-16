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


class CheckoutV2Controller extends Controller{
    private $cache_prefix_key = "checkout_v2_";
    private $cache_ttl = "360000";
    private $view_prefix_key = "checkoutv1";

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
        \Debugbar::disable(); /* 开启后容易出现前端JS报错的情况 */

        $product_cache_key = $this->cache_prefix_key."product_".$slug;
        $product = Cache::get($product_cache_key);

        if(empty($product)) {
            $slugOrPath = $slug;
            $product = $this->productRepository->findBySlug($slugOrPath);
            Cache::put($product_cache_key, $product, $this->cache_ttl);
        }

        if (
            ! $product
            || ! $product->visible_individually
            || ! $product->url_key
            || ! $product->status
        ) {
            abort(404);
        }

        visitor()->visit($product);

        //
        //$package_products = [];
        $product_attributes = [];
        $package_products = $this->makeProducts($product, [3,2,1,4]);
        $skus = [];

        $cache_key = $this->cache_prefix_key."product_sku_".$product->id;
        $skus = Cache::get($cache_key);
        if(empty($skus)) {
            $sku_products = $this->productRepository->where("parent_id", $product->id)->get();
            $attributeOptionRepository = app(AttributeOptionRepository::class);
            foreach($sku_products as $key=>$sku) {
                $sku_id = $sku->id;
                $sku_code = $sku->sku;
                unset($sku);
                $productAttribute = $this->productAttributeValueRepository->findOneWhere([
                    'product_id'   => $sku_id,
                    'attribute_id' => 2,
                ]);
                $sku['name'] = $productAttribute['text_value'];
                $sku['sku_code'] = $sku_code;
                $sku['sku_id'] = $sku_id;
    
                $colorAttribute = $this->productAttributeValueRepository->findOneWhere([
                    'product_id'   => $sku_id,
                    'attribute_id' => 23,
                ]);
    
                $sizeAttribute = $this->productAttributeValueRepository->findOneWhere([
                    'product_id'   => $sku_id,
                    'attribute_id' => 24,
                ]);
    
                $SizeattributeOptions = $attributeOptionRepository->findOneWhere(['id'=>$sizeAttribute['integer_value']]);
                $ColorattributeOptions = $attributeOptionRepository->findOneWhere(['id'=>$colorAttribute['integer_value']]);
                
    
               // $attribute_name = $ColorattributeOptions->admin_name.",".$SizeattributeOptions->admin_name;
                $attribute_name = $SizeattributeOptions->admin_name.",".$ColorattributeOptions->admin_name;
    
                $sku['attribute_name'] = $attribute_name;
                $sku['attr_id'] = "24_".$colorAttribute['integer_value'].",23_".$sizeAttribute['integer_value'];
    
                //$sku['key'] = $ColorattributeOptions->admin_name."_".$SizeattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
                $sku['key'] = $SizeattributeOptions->admin_name."_".$ColorattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
                
                $skus[] = $sku;
            }
            Cache::put($cache_key, json_encode($skus), $this->cache_ttl);
        }else {
            $skus = json_decode($skus, JSON_OBJECT_AS_ARRAY);
        }

        $productBgAttribute = "";
        $productBgAttribute_mobile = "";

        $product_attributes_key = $this->cache_prefix_key."product_attributes_".$product->id;

        $attributes = Cache::get($product_attributes_key);

        if(empty($attribute)) {
            $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
            $attributes = $productViewHelper->getConfigurationConfig($product);
            Cache::put($product_attributes_key, $attributes, $this->cache_ttl);
        }

        


        $app_env = config("app.env");

        // 获取 faq 数据
        $redis = Redis::connection('default');
        $faqItems = $redis->hgetall($this->faq_cache_key);

        sort($faqItems);
        //var_dump($faqItems);exit;

        //size
        $size_image_url_key = $this->cache_prefix_key."product_size_image_".$product->id;
        $size_image_url = Cache::get($size_image_url_key);
        if(empty($size_image_url)) {
            $productSizeImage = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 32,
            ]);
            if(!is_null($productSizeImage)){
                if(isset($productSizeImage->text_value)) {
                    $size_image_url = $productSizeImage->text_value;
                    Cache::set($size_image_url_key, $size_image_url, $this->cache_ttl);
                }
                
            }
        }

        // ad pc pic
        $pc_ad_image_url_key = $this->cache_prefix_key."product_pc_ad_image_".$product->id;
        $pc_ad_image_url = Cache::get($pc_ad_image_url_key);
        if(empty($pc_ad_image_url)) {
            $productBgAttribute = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 29,
            ]);
            if(!is_null($productBgAttribute)){
                if(isset($productBgAttribute->text_value)) {
                    $pc_ad_image_url = $productBgAttribute->text_value;
                    Cache::set($pc_ad_image_url_key, $size_image_url, $this->cache_ttl);
                }
                
            }
        }

        //comments
        $comments = $redis->hgetall($this->cache_prefix_key."product_comments_".$product['id']);
        //var_dump($comments);exit;
        // ad texts

        $product_ad_text = $redis->hgetall($this->cache_prefix_key."product_ads_".$product['id']);
        ///var_dump($comments);exit;

        return view('checkout::product-detail-'.$this->view_prefix_key, compact('product','package_products', 'product_attributes', 'skus','productBgAttribute','productBgAttribute_mobile', 'attributes','app_env','faqItems','size_image_url','pc_ad_image_url','comments','product_ad_text'));

    }
}