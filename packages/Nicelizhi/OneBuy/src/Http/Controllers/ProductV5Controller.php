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
use Illuminate\Http\Response;
use Webkul\Sales\Repositories\OrderTransactionRepository;


class ProductV5Controller extends Controller
{

    private $faq_cache_key = "faq";

    private $cache_prefix_key = "checkout_v1_";
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

        if (
            ! $product
            || ! $product->visible_individually
            || ! $product->url_key
            || ! $product->status
        ) {
            abort(404);
        }

        // log the refer info
        $refer = $request->input("refer");
        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
        }else{
            $refer = $request->session()->get('refer');
        }


        $redis = Redis::connection('default');

        $package_products = [];
        $productBaseImage = product_image()->getProductBaseImage($product);
        $package_products = \Nicelizhi\OneBuy\Helpers\Utils::makeProducts($product, [2,1,3,4]);

        $skus = [];

        $cache_key = "product_sku_".$product->id;
        $size_cache_key = "product_sku_size_".$product->id;
        $color_cache_key = "product_color_size_".$product->id;
        $skus = Cache::get($cache_key);
        $qty_items_size = Cache::get($size_cache_key);
        $qty_items_color = Cache::get($color_cache_key);

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
    
                // banner pic big url (pc)
                $colorAttribute = $this->productAttributeValueRepository->findOneWhere([
                    'product_id'   => $sku_id,
                    'attribute_id' => 23,
                ]);
    
                // banner pic mobile url
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

                $attribute_name = "";
                $sku_key = "";
               

                if(!is_null($SizeattributeOptions)) {
                    $attribute_name .= $SizeattributeOptions->admin_name;
                    $sku_key = $SizeattributeOptions->admin_name;

                    //$qty_items_size[$SizeattributeOptions->admin_name][] = $ColorattributeOptions->admin_name;
                }
                if(!is_null($ColorattributeOptions)) {
                    if(!empty($attribute_name)) {
                        $attribute_name.=",".$ColorattributeOptions->admin_name;
                        $sku_key.= "_".$ColorattributeOptions->admin_name;
                    }else{
                        $attribute_name = $ColorattributeOptions->admin_name;
                        $sku_key = $ColorattributeOptions->admin_name;
                    }
                    //$qty_items_color[$ColorattributeOptions->admin_name][] = $SizeattributeOptions->admin_name;
                }
                
                
                
                // $attribute_name = $SizeattributeOptions->admin_name.",".$ColorattributeOptions->admin_name;
    
                // $sku['attribute_name'] = $attribute_name;
                // $sku['attr_id'] = "24_".$colorAttribute['integer_value'].",23_".$sizeAttribute['integer_value'];

                $sku['attribute_name'] = $attribute_name;
                $sku['attr_id'] = $attr_id;
    
                //$sku['key'] = $ColorattributeOptions->admin_name."_".$SizeattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
                //$sku['key'] = $SizeattributeOptions->admin_name."_".$ColorattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
                $sku['key'] = $sku_key; // 这个数据需要留意他的位置，JS判断会需要使用

                
                
                
                $skus[] = $sku;
            }
            Cache::put($cache_key, json_encode($skus));
            Cache::put($size_cache_key, json_encode($qty_items_size));
            Cache::put($color_cache_key, json_encode($qty_items_color));
        }else {
            $skus = json_decode($skus, JSON_OBJECT_AS_ARRAY);
        }

        $skus = (array) $skus;

        $product_attributes = [];

        $cache_key = "product_attributes_".$product->id;
        $product_attributes = Cache::get($cache_key);

        

        //$product_attributes = [];
        if(empty($product_attributes)) {
            //if(true) {
    
                $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
                $attributes = $productViewHelper->getConfigurationConfig($product);
                
                
                $productSizeImage = $this->productAttributeValueRepository->findOneWhere([
                    'product_id'   => $product->id,
                    'attribute_id' => 32,
                ]);
    
                //获取到他底部的商品内容
            // $attributes = $this->productRepository->getSuperAttributes($product);
                
    
                foreach($attributes['attributes'] as $key=>$attribute) {
    
                    $product_attr_sort_cache_key = "product_attr_sort_".$attribute['id']."_".$product->id;
                    $product_attr_sort = $redis->hgetall($product_attr_sort_cache_key); // get sku sort
    
                    //var_dump($attribute);
                    $attribute['name'] = $attribute['code'];
                    $options = [];
                    foreach($attribute['options'] as $kk=>$option) {
                        // 获取商品图片内容
                        $is_sold_out = false;
                        if($attribute['id']==23) {
                            $new_id = $option['products'][0];
                            $new_product = $this->productRepository->find($new_id);
                            $NewproductBaseImage = product_image()->getProductBaseImage($new_product);
                            $option['image'] = @$NewproductBaseImage['large_image_url'];
                            $option['big_image'] = @$NewproductBaseImage['large_image_url'];
                            
                        }else{
                            $option['image'] = $productBaseImage['large_image_url'];
                            $option['large_image'] = @$productBaseImage['large_image_url'];
                        }
    
                        // 判断是否有对应的尺码内容
                        
                        $option['is_sold_out'] = $is_sold_out;
                        $option['name'] = $option['label'];
                        unset($option['admin_name']);
    
                        if(!empty($product_attr_sort)) {
                            $sort = isset($product_attr_sort[$option['id']]) ? intval($product_attr_sort[$option['id']]) : 4 ;
                            $option['sort'] = $sort;
                            $options[$sort] = $option;
                        }else{
                            $options[] = $option;
                        }
                        //var_dump($options);
                    }
    
                    //var_dump($options);
                    //array_multisort($options,)
                    //var_dump($options);
                    ksort($options);
                    //var_dump($options);exit;
    
                    $tip = "";
                    $tip_img = "";
                    if($attribute['id']==24) {
                        $tip = trans('onebuy::app.product.Size Chart');
                        if(isset($productSizeImage->text_value)) $tip_img = $productSizeImage->text_value;
                        if(empty($tip_img)) $tip = "";
                    }
                    
                    $attribute['tip'] = $tip;
                    $attribute['tip_img'] = $tip_img;
    
                    unset($attribute['translations']); //去掉多余的数据内容
                    //var_dump($options);
                    $attribute['options'] = $options;
                    $attribute['image'] = $productBaseImage['large_image_url'];
                    $attribute['large_image'] = $productBaseImage['large_image_url'];
                    
                    $product_attributes[] = $attribute;
                }
    
                Cache::put($cache_key, json_encode($product_attributes));
    
        }else{
            $product_attributes = json_decode($product_attributes, JSON_OBJECT_AS_ARRAY);
        }

        if (!is_null($product_attributes)) rsort($product_attributes);
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

        $faqItems = $redis->hgetall($this->faq_cache_key);
        ksort($faqItems);
        $comments = $redis->hgetall($this->cache_prefix_key."product_comments_".$product['id']);
        //获取 paypal smart key
        $paypal_client_id = core()->getConfigData('sales.payment_methods.paypal_smart_button.client_id');

        //支持的区域
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

        // get product reviews
        
        // products display image
        $product_image_lists = Cache::get("product_image_lists_".$product['id']);

        $version = Cache::get("onebuy_".$product['sku']);

        //var_dump($version);
        //var_dump($product_image_lists);



        return view('onebuy::product-detail-v5', compact('gtag',
        'app_env',
        'product',
        'package_products', 
        'product_attributes', 
        'skus',
        'productBgAttribute',
        'productBgAttribute_mobile',
        'faqItems',
        'comments',
        'paypal_client_id',
        'default_country',
        'airwallex_method',
        'payments',
        'payments_default',
        'brand',
        'fb_ids',
        'ob_adv_id',
        'crm_channel',
        'refer',
        'version',
        'product_image_lists',
        'quora_adv_id'
        ));

        //return view('shop::products.view', compact('product')); default shop view
    }

    public function success($order_id, Request $request) {

        $refer = $request->input("refer");

        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
        }else{
            $refer = $request->session()->get('refer');
        }

        $order = [];

        $payment_airwallex_vault = 0; //airwallex vault
        $payment_paypal_vault = 0; // paypal vault

        $orderTrans = $this->orderTransactionRepository->where('transaction_id', $order_id)->select(['order_id','data'])->first();
        if(!is_null($orderTrans)) {
            $order = $this->orderRepository->findOrFail($orderTrans->order_id);
            $payment_paypal_vault = 1;
        }else{
            $order = $this->orderRepository->findOrFail($order_id);
            $orderTrans = $this->orderTransactionRepository->where('order_id', $order_id)->first();
            $payment_airwallex_vault = 1;
        }

        $orderTransData = @json_decode($orderTrans->data, JSON_OBJECT_AS_ARRAY);

        $paypal_vault_id = "";

        //var_dump($orderTransData['vault']);exit;

        if(isset($orderTransData['vault'])) {
            $paypal_vault_id = $orderTransData['vault']['id'];
        }
        

        $fb_ids = config('onebuy.fb_ids');
        $ob_adv_id = config('onebuy.ob_adv_id');
        $crm_channel = config('onebuy.crm_channel');
        $gtag = config('onebuy.gtag');

        $quora_adv_id = config('onebuy.quora_adv_id');

        $countries = config("countries");


        $app_env = config("app.env");

        $default_country = config('onebuy.default_country');
        $order_pre = config('shopify.order_pre');

        $recommend_products = [];

        $paypal_id_token = $request->session()->get('paypal_id_token');
        $paypal_access_token = $request->session()->get('paypal_access_token');

        //var_dump($paypal_access_token, $paypal_id_token);

        if(empty($paypal_id_token)) {
            $paypal_id_token = $this->smartButton->getIDAccessToken();
            $paypal_access_token = $paypal_id_token->result->access_token;
            $paypal_id_token = $paypal_id_token->result->id_token;

            
            
            $request->session()->put('paypal_id_token', $paypal_id_token);
            $request->session()->put('paypal_access_token', $paypal_access_token);
        }

        
        $paypal_pay_acc = core()->getConfigData('sales.payment_methods.paypal_smart_button.client_id');
        $app_env = config("app.env");

        // airwallex customer id from redis
        $airwallex_customer_id = Redis::get("airwallex_customer_".$order->id);

        $payment_return_url = config('app.url')."/onebuy/checkout/v5/success/".$order->id;
        $payment_cancel_url = config('app.url')."/onebuy/checkout/v5/success/".$order->id;



        return view('onebuy::checkout-success-v5', compact('order',
            "fb_ids",
            "ob_adv_id",
            "crm_channel",
            "refer",
            "gtag",
            "quora_adv_id",
            "countries",
            "default_country",
            "app_env",
            "order_pre",
            "paypal_id_token",
            "paypal_pay_acc",
            "payment_airwallex_vault",
            "payment_paypal_vault",
            "paypal_vault_id",
            "orderTrans",
            "airwallex_customer_id",
            "payment_return_url",
            "payment_cancel_url",
            "recommend_products"
        ));
    }

    

}