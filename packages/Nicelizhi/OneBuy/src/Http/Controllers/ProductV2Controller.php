<?php
namespace Nicelizhi\OneBuy\Http\Controllers;

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


class ProductV2Controller extends Controller
{

    private $faq_cache_key = "faq";

    private $cache_prefix_key = "onebuy_v2_";
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
        
        $slugOrPath = $slug;
        $product = $this->productRepository->findBySlug($slugOrPath);

        if (
            ! $product
            || ! $product->visible_individually
            || ! $product->url_key
            || ! $product->status
        ) {
            abort(404);
        }

        //visitor()->visit($product);

        $refer = $request->input("refer");

        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
        }else{
            $refer = $request->session()->get('refer');
        }

        

        //var_dump($product);exit;

        // 四个商品的价格情况
        $package_products = [];
        $productBaseImage = product_image()->getProductBaseImage($product);
        //$package_products = $this->makeProducts($product, [2,1,3,4]);
        $package_products = \Nicelizhi\OneBuy\Helpers\Utils::makeProducts($product, [2,1,3,4]);


        // skus 数据
        $skus = [];
        $cache_key = "product_sku_".$product->id;
        $size_cache_key = "product_sku_size_".$product->id;
        $color_cache_key = "product_color_size_".$product->id;
        $skus = Cache::get($cache_key);
        $qty_items_size = Cache::get($size_cache_key);
        $qty_items_color = Cache::get($color_cache_key);
        $skus = [];
        if(empty($skus)) {
            $sku_products = $this->productRepository->where("parent_id", $product->id)->get();
            $attributeOptionRepository = app(AttributeOptionRepository::class);
            
            foreach($sku_products as $key=>$sku) {
                $sku_id = $sku->id;
                $sku_code = $sku->sku;
                unset($sku);
                /**
                 * 
                 * 
                 * {"name":"Women's thin no wire lace bra - Black \/ S","sku_code":"CJ02168-C#black-S#m","sku_id":44113194877163,"attribute_name":"S,Black","key":"S_Black"}
                 * 
                 * 
                 */
                $productAttribute = $this->productAttributeValueRepository->findOneWhere([
                    'product_id'   => $sku_id,
                    'attribute_id' => 2,
                ]);
    
                //var_dump($productAttribute);
    
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

                $attr_id = "";
                $ColorattributeOptions = null;
                if(!is_null($colorAttribute)) {
                    $ColorattributeOptions = $attributeOptionRepository->findOneWhere(['id'=>$colorAttribute['integer_value']]);
                    $attr_id = "24_".$colorAttribute['integer_value'];
                } 
                $SizeattributeOptions = null;
                if(!is_null($sizeAttribute)) {
                    $SizeattributeOptions = $attributeOptionRepository->findOneWhere(['id'=>$sizeAttribute['integer_value']]);
                    if(empty($attr_id)) {
                        $attr_id = "23_".$sizeAttribute['integer_value'];
                    }else{
                        $attr_id .= ",23_".$sizeAttribute['integer_value'];
                    }
                    
                } 
                
                
                
                
    
               // $attribute_name = $ColorattributeOptions->admin_name.",".$SizeattributeOptions->admin_name;
                //$attribute_name = $SizeattributeOptions->admin_name.",".$ColorattributeOptions->admin_name;

                $attribute_name = "";
                $sku_key = "";
               

                if(!is_null($SizeattributeOptions)) {
                    $attribute_name .= $SizeattributeOptions->admin_name;
                    $sku_key = $SizeattributeOptions->admin_name;
                }
                if(!is_null($ColorattributeOptions)) {
                    if(!empty($attribute_name)) {
                        $attribute_name.=",".$ColorattributeOptions->admin_name;
                        $sku_key.= "_".$ColorattributeOptions->admin_name;
                    }else{
                        $attribute_name = $ColorattributeOptions->admin_name;
                        $sku_key = $ColorattributeOptions->admin_name;
                    }
                }
    
                $sku['attribute_name'] = $attribute_name;
                $sku['attr_id'] = $attr_id;
                //$sku['attr_id'] = "24_".$colorAttribute['integer_value'].",23_".$sizeAttribute['integer_value'];
    
                //$sku['key'] = $ColorattributeOptions->admin_name."_".$SizeattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
                //$sku['key'] = $SizeattributeOptions->admin_name."_".$ColorattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
                $sku['key'] = $sku_key;

                // $qty_items_color[$ColorattributeOptions->admin_name][] = $SizeattributeOptions->admin_name;
                // $qty_items_size[$SizeattributeOptions->admin_name][] = $ColorattributeOptions->admin_name;
                
                $skus[] = $sku;
            }
            Cache::put($cache_key, json_encode($skus));
            //Log::info(json_encode($qty_items_size));
            //Cache::put($size_cache_key, json_encode($qty_items_size));
            //Cache::put($color_cache_key, json_encode($qty_items_color));
        }else {
            $skus = json_decode($skus, JSON_OBJECT_AS_ARRAY);
        }


        $product_attributes = [];

        $cache_key = "product_attributes_".$product->id;
        $product_attributes = Cache::get($cache_key);

        $cache_key_1 = "product_category_".$product->id;
        $product_category = Cache::get($cache_key_1);
        if(empty($product_category)) {
            $categories = $product->categories;
            if(isset($categories[0])) {
                $product_category_id = intval($categories[0]->id);
            }else{
                $product_category_id = 9;
            }
            
            Cache::put($cache_key_1, $product_category_id);
        }else{
            //$product_category = json_decode($product_category);
            //var_dump($product_category);exit;
            $product_category_id = intval($product_category);
        }

        // $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
        // $attributes = $productViewHelper->getConfigurationConfig($product);
        // var_dump($attributes);

        if(empty($product_attributes)) {

            $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
            $attributes = $productViewHelper->getConfigurationConfig($product);
            
            
            $productSizeImage = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 32,
            ]);
            

            //var_dump($customAttributeValues);exit;

            //获取到他底部的商品内容
        // $attributes = $this->productRepository->getSuperAttributes($product);
            
            foreach($attributes['attributes'] as $key=>$attribute) {
                $attribute['name'] = $attribute['code'];
                $options = [];
                foreach($attribute['options'] as $kk=>$option) {

                    // 获取商品图片内容
                    $is_sold_out = false;
                    if($attribute['id']==23) {
                        $new_id = $option['products'][0];
                        $new_product = $this->productRepository->find($new_id);
                        $NewproductBaseImage = product_image()->getProductBaseImage($new_product);
                        $option['image'] = @$NewproductBaseImage['medium_image_url'];
                        
                    }else{
                        $new_id = $option['products'][0];
                        $new_product = $this->productRepository->find($new_id);
                        $NewproductBaseImage = product_image()->getProductBaseImage($new_product);
                        $option['image'] = $productBaseImage['medium_image_url'];
                        
                    }
                    // 判断是否有对应的尺码内容
                    $option['is_sold_out'] = $is_sold_out;
                    $option['name'] = $option['label'];
                    unset($option['admin_name']);
                    $options[] = $option;
                    //var_dump($option);
                }

                $tip = "";
                $tip_img = "";
                if($attribute['id']==24) {
                    $tip = "Size Chart";
                    if(isset($productSizeImage->text_value)) $tip_img = $productSizeImage->text_value;
                    if(empty($tip_img)) $tip = "";
                }
                
                $attribute['tip'] = $tip;
                $attribute['tip_img'] = $tip_img;

                unset($attribute['translations']); //去掉多余的数据内容
                //var_dump($options);
                $attribute['options'] = $options;
                $attribute['image'] = $productBaseImage['medium_image_url'];
                $product_attributes[] = $attribute;
            }

            Cache::put($cache_key, json_encode($product_attributes));

        }else{
            $product_attributes = json_decode($product_attributes, JSON_OBJECT_AS_ARRAY);
        }

        rsort($product_attributes);

        //商品的背景图片获取

        $productBgAttribute = $this->productAttributeValueRepository->findOneWhere([
            'product_id'   => $product->id,
            'attribute_id' => 29,
        ]);


        $productBgAttribute_mobile = $this->productAttributeValueRepository->findOneWhere([
            'product_id'   => $product->id,
            'attribute_id' => 30,
        ]);

        
        $app_env = config("app.env");

        //var_dump($productBgAttribute);

        // 获取 faq 数据
        $redis = Redis::connection('default');
        $faqItems = $redis->hgetall($this->faq_cache_key);

        ksort($faqItems);

        $comments = $redis->hgetall($this->cache_prefix_key."product_comments_".$product['id']);
        if(empty($comments)) $comments = $redis->hgetall("checkout_v1_product_comments_".$product['id']);
        

        
        //获取 paypal smart key
        $paypal_client_id = core()->getConfigData('sales.payment_methods.paypal_smart_button.client_id');


        //支持的区域
        $countries = config("countries");

        $default_country = config('onebuy.default_country');

        $airwallex_method = config('onebuy.airwallex.method');

        $payments = config('onebuy.payments'); // config the payments status
        $payments_default = config('onebuy.payments_default');

        $brand = config('onebuy.brand');

        $fb_ids = config('onebuy.fb_ids');

        $gtag = config('onebuy.gtag');

        $ob_adv_id = config('onebuy.ob_adv_id');

        $crm_channel = config('onebuy.crm_channel');

        $quora_adv_id = config('onebuy.quora_adv_id');


        return view('onebuy::product-detail-v2', compact('gtag','app_env','product','package_products', 'product_attributes', 'skus','productBgAttribute','productBgAttribute_mobile','faqItems','comments','paypal_client_id','default_country','airwallex_method','payments','payments_default','brand','fb_ids','ob_adv_id','crm_channel','refer',"quora_adv_id"));
    }

}