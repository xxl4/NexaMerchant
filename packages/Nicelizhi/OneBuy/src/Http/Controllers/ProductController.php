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
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Webkul\Sales\Repositories\OrderTransactionRepository;


class ProductController extends Controller
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
        protected CartRuleCouponRepository $cartRuleCouponRepository,
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
        //\Debugbar::disable(); /* 开启后容易出现前端JS报错的情况 */
        
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

        //visitor()->visit($product);

        $refer = $request->input("refer");

        if(!empty($refer)) { 
            $request->session()->put('refer', $refer);
            $request->session()->put('refer_'.$slug, $refer);
        }else{
            $refer = $request->session()->get('refer');
        }

        // 四个商品的价格情况
        $package_products = [];
        $productBaseImage = product_image()->getProductBaseImage($product);
        $package_products = \Nicelizhi\OneBuy\Helpers\Utils::makeProducts($product, [2,1,3,4]);

        // 获取 faq 数据
        $redis = Redis::connection('default');

        // skus 数据
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
    
                $SizeattributeOptions = $attributeOptionRepository->findOneWhere(['id'=>$sizeAttribute['integer_value']]);
                $ColorattributeOptions = $attributeOptionRepository->findOneWhere(['id'=>$colorAttribute['integer_value']]);
                
                $attribute_name = $SizeattributeOptions->admin_name.",".$ColorattributeOptions->admin_name;
    
                $sku['attribute_name'] = $attribute_name;
                $sku['attr_id'] = "24_".$colorAttribute['integer_value'].",23_".$sizeAttribute['integer_value'];
    
                //$sku['key'] = $ColorattributeOptions->admin_name."_".$SizeattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
                $sku['key'] = $SizeattributeOptions->admin_name."_".$ColorattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用

                $qty_items_color[$ColorattributeOptions->admin_name][] = $SizeattributeOptions->admin_name;
                $qty_items_size[$SizeattributeOptions->admin_name][] = $ColorattributeOptions->admin_name;
                
                $skus[] = $sku;
            }
            Cache::put($cache_key, json_encode($skus));
            Cache::put($size_cache_key, json_encode($qty_items_size));
            Cache::put($color_cache_key, json_encode($qty_items_color));
        }else {
            $skus = json_decode($skus, JSON_OBJECT_AS_ARRAY);
        }

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
                    // 
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

        
        $faqItems = $redis->hgetall($this->faq_cache_key);
        ksort($faqItems);
        // $comments = $redis->hgetall($this->cache_prefix_key."product_comments_".$product['id']);
        
        $comments = $product->reviews->where('status', 'approved')->take(10);

        $comments = $comments->map(function($comments) {
            $comments->customer = $comments->customer;
            $comments->images;
            return $comments;
        });
        //Log::info($product['id'].'--'.json_encode($comments));
        //Log::info($product['id'].'--'.count($comments));
        if(count($comments)==0) {
            //Log::info($product['id'].'--'.$this->cache_prefix_key."product_comments_".$product['id']);
            $comments = $redis->hgetall($this->cache_prefix_key."product_comments_".$product['id']);
            foreach($comments as $key=>$comment) {
                $comment = json_decode($comment);
                $comment->comment = $comment->content;
                $comments[$key] = $comment;
            }
            //var_dump($comments);
        }

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

        return view('onebuy::product-detail', compact('gtag','app_env','product','package_products', 'product_attributes', 'skus','productBgAttribute','productBgAttribute_mobile','faqItems','comments','paypal_client_id','default_country','airwallex_method','payments','payments_default','brand','fb_ids','ob_adv_id','crm_channel','refer','quora_adv_id'));
    }

    public function cms($slug, Request $request) {
       // \Debugbar::disable(); /* 开启后容易出现前端JS报错的情况 */

        $page = $this->cmsRepository->findByUrlKeyOrFail($slug);
        
        return view('onebuy::cms.page')->with('page', $page);

    }

    // airwallex
    public function order_add_sync(Request $request) {
        //var_dump($request->all());

        $payment_method_input = $request->input('payment_method');

        $input = $request->all();

        $refer = $request->session()->get('refer');
        Log::info("refer checkout v1 ".$refer);

        $last_order_id = $request->session()->get('last_order_id'); // check the laster order id
        //$last_order_id = "ddddd";
        $force = $request->input("force");

        Log::info("last order id " . $last_order_id);

        if(!empty($last_order_id) && $force !="1") {
            return response()->json(['error' => 'You Have already placed order, if you want to place another order please confirm your order','code'=>'202'], 400);
        }


        $payment_airwallex_vault = isset($input['payment_airwallex_vault']) ? $input['payment_airwallex_vault'] : 0;
        $request->session()->put('payment_airwallex_vault', $payment_airwallex_vault);
        
        $products = $request->input("products");
        if(empty($products)) {
            return response()->json(['error' => 'No product found in cart','code'=>'202'], 400);
        }
        // 添加到购物车
        Cart::deActivateCart();
        foreach($products as $key=>$product) {
            //var_dump($product);
            $product['quantity'] = $product['amount'];
            if(!isset($product['variant_id'])) {
                return response()->json(['error' => 'No product found in cart','code'=>'202'], 400);
            }
            $product['selected_configurable_option'] = $product['variant_id'];
            
            if(!empty($product['attr_id'])) {
                $attr_ids = explode(',', $product['attr_id']);
                foreach($attr_ids as $key=>$attr_id) {
                    $attr = explode('_', $attr_id);
                    $super_attribute[$attr[0]] = $attr[1];
                }
    
                $product['super_attribute'] = $super_attribute;
            }
            //Log::info("add product into cart ". json_encode($product));
            $cart = Cart::addProduct($product['product_id'], $product);

            if (
                is_array($cart)
                && isset($cart['warning'])
            ) {
                return new JsonResource([
                    'message' => $cart['warning'],
                ]);
            }

        }
        // 添加地址内容
        $addressData = [];


        $addressData['billing'] = [];
        $address1 = [];
        array_push($address1, $input['address']);
        $addressData['billing']['city'] = $input['city'];
        $addressData['billing']['country'] = $input['country'];
        $addressData['billing']['email'] = $input['email'];
        $addressData['billing']['first_name'] = $input['first_name'];
        $addressData['billing']['last_name'] = $input['second_name'];
        $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
        $addressData['billing']['phone'] = $input['phone_full'];
        $addressData['billing']['postcode'] = $input['code'];
        $addressData['billing']['state'] = $input['province'];
        $addressData['billing']['use_for_shipping'] = true;
        $addressData['billing']['address1'] = $address1;

        $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

        $shipping = [];
        $address1 = [];
        array_push($address1, $input['address']);
        $shipping['city'] = $input['city'];
        $shipping['country'] = $input['country'];
        $shipping['email'] = $input['email'];
        $shipping['first_name'] = $input['first_name'];
        $shipping['last_name'] = $input['second_name'];
        //undefined+
        $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
        $shipping['phone'] = $input['phone_full'];
        $shipping['postcode'] = $input['code'];
        $shipping['state'] = $input['province'];
        $shipping['use_for_shipping'] = true;
        $shipping['address1'] = $address1;
        $shipping['address1'] = implode(PHP_EOL, $shipping['address1']);
        
        
        $addressData['shipping'] = $shipping;
        $addressData['shipping']['isSaved'] = false;
        $address1 = [];
        array_push($address1, $input['address']);
        $addressData['shipping']['address1'] = $address1;
        $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

        // customer bill address info
        if(@$input['shipping_address']=="other") {
            $address1 = [];
            array_push($address1, $input['bill_address']);
            $billing = [];
            $billing['city'] = $input['bill_city'];
            $billing['country'] = $input['bill_country'];
            $billing['email'] = $input['email'];
            $billing['first_name'] = $input['bill_first_name'];
            $billing['last_name'] = $input['bill_second_name'];
            //undefined+
            $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
            $billing['phone'] = $input['phone_full'];
            $billing['postcode'] = $input['bill_code'];
            $billing['state'] = $input['bill_province'];
            //$billing['use_for_shipping'] = true;
            $billing['address1'] = $address1;
            $billing['address1'] = implode(PHP_EOL, $billing['address1']);

           // $billing['address1'] = implode(PHP_EOL, $billing['address1']);

            $addressData['billing'] = $billing;
        }


        Log::info("address" . json_encode($addressData));


        if (
            Cart::hasError()
            || ! Cart::saveCustomerAddress($addressData)
        ) {
            return new JsonResource([
                'redirect' => true,
                'data'     => route('shop.checkout.cart.index'),
            ]);
        }


        //处理配送方式
        $shippingMethod = "free_free"; // 包邮
        $shippingMethod = "flatrate_flatrate";
        // Cart::saveShippingMethod($shippingMethod);

        if (
            Cart::hasError()
            || ! $shippingMethod
            || ! Cart::saveShippingMethod($shippingMethod)
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }

        Cart::collectTotals();

        $payment_method = "airwallex";

        if($payment_method_input=="airwallex_klarna") $payment_method = "airwallex";
        if($payment_method_input=="airwallex_dropin") $payment_method = "airwallex";
        if($payment_method_input=="airwallex_google") $payment_method = "airwallex";
        if($payment_method_input=="airwallex_apple") $payment_method = "airwallex";
        if($payment_method_input=="airwallex") $payment_method = "airwallex";

        if($payment_method=="airwallex_google") {

        }

        if($payment_method=="airwallex_apple") {

        }

        // 
        
        if($payment_method=='airwallex') {
            //
            $payment = [];
            $payment['description'] = $payment_method."-".$refer;
            $payment['method'] = $payment_method;
            $payment['method_title'] = $payment_method."-".$refer;
            $payment['sort'] = "2";
            // Cart::savePaymentMethod($payment);

            if (
                Cart::hasError()
                || ! $payment
                || ! Cart::savePaymentMethod($payment)
            ) {
                return response()->json([
                    'redirect_url' => route('shop.checkout.cart.index'),
                ], Response::HTTP_FORBIDDEN);
            }

            // 
            Cart::collectTotals();
            $this->validateOrder();
            $cart = Cart::getCart();

            // when enable the upselling and can config the upselling rule for carts
            $upselling_enable = $request->session()->get('upselling_enable');
            if(config("Upselling.enable") && $upselling_enable) {
                Log::info("upselling_enable". $upselling_enable);
                $upselling = app('NexaMerchant\Upselling\Upselling');
                $upselling->applyUpselling($cart);
            }

            $order = $this->orderRepository->create(Cart::prepareDataForOrder());
            // Cart::deActivateCart();
            // Cart::activateCartIfSessionHasDeactivatedCartId();
            // 
            $data['result'] = 200;
            $data['order'] = $order;
            if ($order) {
                $orderId = $order->id;

                //customer id
                $cus_id = isset($input['cus_id']) ? trim($input['cus_id']) : null;

                $airwallex_customer = [];
                if(is_null($cus_id)) {
                    //Step 1: Create a Customer
                    $airwallex_customer = $this->airwallex->createCustomer($cart, $order->id);
                    if(!isset($airwallex_customer->id)) {
                        Log::info("airwallex-".$order->id."--".json_encode($airwallex_customer));
                        return response()->json(['error' => 'create customer error','code'=>'203'], 400);
                    }
                    $cus_id = $airwallex_customer->id;
                }else{
                    $airwallex_customer['id'] = $cus_id;
                }

                //create a airwallex payment order
                $transactionManager = $this->airwallex->createPaymentOrder($cart, $order->id, $cus_id);

                if(!isset($transactionManager->client_secret)) {
                    response()->json(['error' => $transactionManager->body->message,'code'=>'203'], 400);
                }
                //var_dump($transactionManager);
                
                

                //Step 2: Generate a client secret for the Customer
                $customerClientSecret = $this->airwallex->createCustomerClientSecret($cus_id);
                
                
                if(!isset($transactionManager->client_secret)) {
                    response()->json(['error' => $transactionManager->body->message,'code'=>'203'], 400);
                }
                
                Log::info("airwallex-".$order->id."--".json_encode($transactionManager));
                $data['client_secret'] = $transactionManager->client_secret;
                $data['payment_intent_id'] = $transactionManager->id;
                $data['currency'] = $transactionManager->currency;
                $data['transaction'] = $transactionManager;
                $data['customer'] = $airwallex_customer;
                $data['customer_client_secret'] = $customerClientSecret;
                $data['country'] = $input['country'];
                $data['billing'] = $addressData['billing'];
            }

            return response()->json($data);
        }

        if($payment_method=='paypal_standard') {
            //处理支付方式
            $payment = [];
            $payment['description'] = "PayPal-".$refer;
            $payment['method'] = "paypal_standard";
            $payment['method_title'] = "PayPal standard Button-".$refer;
            $payment['sort'] = "1";
            // Cart::savePaymentMethod($payment);

            if (
                Cart::hasError()
                || ! $payment
                || ! Cart::savePaymentMethod($payment)
            ) {
                return response()->json([
                    'message' => 'save payment error',
                ]);
            }

            Cart::collectTotals();

            $this->validateOrder();

            $cart = Cart::getCart();

            //$order = $this->orderRepository->create(Cart::prepareDataForOrder()); //todo


            if ($redirectUrl = Payment::getRedirectUrl($cart)) {
                $paypalStandard = app('Webkul\Paypal\Payment\Standard');
                $data = [];
                $data['success'] = true;
                $data['redirect'] = $redirectUrl;
                $data['redirect_url'] = $redirectUrl;
                $data['form'] =  $paypalStandard->getFormFields();
                $data['pay_url'] =  $paypalStandard->getPaypalUrl();
                $data['result'] = 200;
                return response()->json($data);
            }else{
                $data = [];
                $data['result'] = 400;
                $data['message'] = $redirectUrl;
                return response()->json($data);
            }
        }
        
        // 商品更新到购物车中。http://45.79.79.208:8002/api/checkout/cart
        // 订单基于购物车中的商品完成订单生成
        
    }

    // paypal 生成订单动作
    /**
     * 
     * @link https://gist.github.com/nicelizhi/76d2a09692459c1a22388366c5861521 input params
     * @return
     */
    public function order_addr_after(Request $request) {
        $input = $request->all();

        $last_order_id = $request->session()->get('last_order_id'); // check the laster order id
        //$last_order_id = "ddddd";
        $force = $request->input("force");

        Log::info("last order id " . $last_order_id);

        if(!empty($last_order_id) && $force !="1") {
            return response()->json(['error' => 'You Have already placed order, if you want to place another order please confirm your order','code'=>'202'], 400);
        }

        $refer = $request->session()->get('refer');

        $payment_paypal_vault = isset($input['payment_paypal_vault']) ? $input['payment_paypal_vault'] : 0;
        $request->session()->put('payment_paypal_vault', $payment_paypal_vault);

        $products = $request->input("products");
        Log::info("products". json_encode($products));
        if(empty($products)) {
            return response()->json(['error' => 'No product found in cart','code'=>'202'], 400);
        }
        // 添加到购物车
        Cart::deActivateCart();
        foreach($products as $key=>$product) {
            //var_dump($product);
            $product['quantity'] = $product['amount'];
            $product['selected_configurable_option'] = $product['variant_id'];
            if(!empty($product['attr_id'])) {
                $attr_ids = explode(',', $product['attr_id']);
                foreach($attr_ids as $key=>$attr_id) {
                    $attr = explode('_', $attr_id);
                    $super_attribute[$attr[0]] = $attr[1];
                }
    
                $product['super_attribute'] = $super_attribute;
            }
            
            //Log::info("add product into cart ". json_encode($product));
            $cart = Cart::addProduct($product['product_id'], $product);
            if (
                is_array($cart)
                && isset($cart['warning'])
            ) {
                return new JsonResource([
                    'message' => $cart['warning'],
                ]);
            }
        }
        // 添加地址内容
        $addressData = [];
        $addressData['billing'] = [];
        $address1 = [];
        array_push($address1, $input['address']);
        $addressData['billing']['city'] = $input['city'];
        $addressData['billing']['country'] = $input['country'];
        $addressData['billing']['email'] = $input['email'];
        $addressData['billing']['first_name'] = $input['first_name'];
        $addressData['billing']['last_name'] = $input['second_name'];
        $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
        $addressData['billing']['phone'] = $input['phone_full'];
        $addressData['billing']['postcode'] = $input['code'];
        $addressData['billing']['state'] = $input['province'];
        $addressData['billing']['use_for_shipping'] = true;
        $addressData['billing']['address1'] = $address1;
        $addressData['shipping'] = [];
        $addressData['shipping']['isSaved'] = false;
        $address1 = [];
        array_push($address1, "");
        $addressData['shipping']['address1'] = $address1;

        $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

        $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

        Log::info("paypal pay ".$refer.'--'.json_encode($addressData));




        if (
            Cart::hasError()
            || ! Cart::saveCustomerAddress($addressData)
        ) {
            return new JsonResource([
                'redirect' => true,
                'data'     => route('shop.checkout.cart.index'),
            ]);
        }


        //处理配送方式
        $shippingMethod = "free_free"; // 包邮
        $shippingMethod = "flatrate_flatrate";
        // Cart::saveShippingMethod($shippingMethod);


        if (
            Cart::hasError()
            || ! $shippingMethod
            || ! Cart::saveShippingMethod($shippingMethod)
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }

        Cart::collectTotals();

        //处理支付方式
        $payment = [];
        $payment['description'] = "PayPal-".$refer;
        $payment['method'] = "paypal_smart_button";
        $payment['method_title'] = "PayPal Smart Button-".$refer;
        $payment['sort'] = "1";
        // Cart::savePaymentMethod($payment);

        $upselling_enable = $request->session()->get('upselling_enable');
        if(config("Upselling.enable") && $upselling_enable) {
            Log::info("upselling_enable". $upselling_enable);
            $upselling = app('NexaMerchant\Upselling\Upselling');
            $upselling->applyUpselling($cart);
        }

        if (
            Cart::hasError()
            || ! $payment
            || ! Cart::savePaymentMethod($payment)
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }

        try {
            $order = $this->smartButton->createOrder($this->buildRequestBody($input));
            $data = [];
            $data['order'] = $order;
            $data['code'] = 200;
            $data['result'] = 200;
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }

        // return response()->json($order);
    }


    /**
     * 
     * 
     * 
     */
    public function confirm(Request $request) {
        $payment_intent_id = $request->input("payment_intent_id");
        $order_id = $request->input("order_id");
        $cus_id = $request->input("cus_id");

        $order = $this->orderRepository->find($order_id);
        
        if(is_null($order)) {
            return response()->json([
                "message" => "Order not found"
            ], 404);
        }
        
        $transactionManager = $this->airwallex->confirmPayment($payment_intent_id, $order, $cus_id);

        $request->session()->put('last_order_id', $order_id);

        $data = [];
        $data['payment'] = $transactionManager;
        $data['code'] = 200;
        $data['result'] = 200;
        $data['order_id'] = $order_id;
        $data['order_id'] = $order_id;
        return response()->json($data);
        
    }

    /**
     * 
     * 订单状态查询
     * paypal 订单生成
     * 
     */
    public function order_status(Request $request) {

        $refer = $request->session()->get('refer');
        Log::info("refer checkout v1 ".$refer);

        try {
            $order = $this->smartButton->getOrder(request()->input('orderData.orderID'));

            // paypal caputre order
            //$this->smartButton->captureOrder(request()->input('orderData.orderID'));

            // var_dump($order);
            // var_dump($order['result']);
            // return response()->json($order);
            
            Log::info("paypal ".json_encode($order));
            Log::info("paypal request ".json_encode($request->all()));

            $params = request()->input("params");
            if(!empty($params)) {

                $addressData = [];
                $addressData['billing'] = [];
                $address1 = [];
                array_push($address1, $params['address']);

                $addressData['billing']['city'] = $params['city'];
                $addressData['billing']['email'] = $params['email'];
                $addressData['billing']['country'] = $params['country'];
                $addressData['billing']['first_name'] = $params['first_name'];
                $addressData['billing']['last_name'] = $params['second_name'];
                $addressData['billing']['phone'] = $params['phone_full'];
                $addressData['billing']['phone'] = $params['phone_full'];
                $addressData['billing']['address1'] = $address1;
                
                $addressData['billing']['state'] = $params['province'];
                $addressData['billing']['postcode'] = $params['code'];

                //$addressData['shipping'] = [];
                $addressData['shipping']['isSaved'] = false;
                //$address1 = [];
                //array_push($address1, "");
                $addressData['shipping']['address1'] = $address1;

                $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

                $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);
                if(!isset($addressData['shipping']['email'])) {
                    $addressData['shipping'] = $addressData['billing'];
                }
                

                Log::error("paypal pay address ".$refer.'--'.json_encode($addressData));

                if (
                    Cart::hasError()
                    || ! Cart::saveCustomerAddress($addressData)
                ) {
                    return new JsonResource([
                        'redirect' => true,
                        'data'     => route('shop.checkout.cart.index'),
                    ]);
                }

                // if the status not eq completed, then capture the order

                if($order->result->status != "COMPLETED") {
                    $this->smartButton->captureOrder(request()->input('orderData.orderID'));
                }
                //$this->smartButton->captureOrder(request()->input('orderData.orderID'));
    
                //$this->smartButton->AuthorizeOrder(request()->input('orderData.orderID'));
    
                $request->session()->put('last_order_id', request()->input('orderData.orderID'));

            }else{

                $order = (array)$order;

                //var_dump($order);

                $purchase_units = (array)$order['result']->purchase_units;
                $input = (array)$purchase_units[0]->shipping;
                $payer = (array)$order['result']->payer;
                $payment_source = (array)$order['result']->payment_source;
                $payment_source_paypal = (array)$payment_source['paypal'];

                //Log::info("paypal source".json_encode($payment_source));
                //Log::info("paypal source paypal".json_encode($payment_source_paypal));

                // 添加地址内容
                $addressData = [];
                $addressData['billing'] = [];
                $address1 = [];
                $address_line_2 = isset($input['address']->address_line_2) ? $input['address']->address_line_2 : "";
                array_push($address1, $input['address']->address_line_1. $address_line_2);
                $addressData['billing']['city'] = isset($input['address']->admin_area_2) ? $input['address']->admin_area_2 : "";
                $addressData['billing']['country'] = $input['address']->country_code;
                $addressData['billing']['email'] = $payer['email_address'];
                $addressData['billing']['first_name'] = $payer['name']->given_name;
                $addressData['billing']['last_name'] = $payer['name']->surname;
                $national_number = isset($payment_source_paypal['phone_number']) ? $payment_source_paypal['phone_number']->national_number : "";
                $addressData['billing']['phone'] =  $national_number;
                $addressData['billing']['postcode'] = isset($input['address']->postal_code) ? $input['address']->postal_code : "";
                $addressData['billing']['state'] = isset($input['address']->admin_area_1) ? $input['address']->admin_area_1 : "";
                $addressData['billing']['use_for_shipping'] = true;
                $addressData['billing']['address1'] = $address1;
                $addressData['shipping'] = [];
                $addressData['shipping']['isSaved'] = false;
                $address1 = [];
                array_push($address1, "");
                $addressData['shipping']['address1'] = $address1;

                $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

                $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

                if (
                    Cart::hasError()
                    || ! Cart::saveCustomerAddress($addressData)
                ) {
                    return new JsonResource([
                        'redirect' => true,
                        'data'     => route('shop.checkout.cart.index'),
                    ]);
                }
    
                if($order['result']->status != "COMPLETED") {
                    $this->smartButton->captureOrder(request()->input('orderData.orderID'));
                }
    
                //$this->smartButton->AuthorizeOrder(request()->input('orderData.orderID'));
    
                $request->session()->put('last_order_id', request()->input('orderData.orderID'));

            }


            //Log::info("address data-".$refer.'--'.json_encode($addressData));

            return $this->saveOrder();
        } catch (\Exception $e) {
            Log::info("paypal pay exception". json_encode($e->getMessage()));
            return response()->json($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
        
    }

      /**
     * Saving order once captured and all formalities done.
     *
     * @return \Illuminate\Http\Response
     */
    protected function saveOrder()
    {
        if (Cart::hasError()) {
            return response()->json(['redirect_url' => route('shop.checkout.cart.index')], 403);
        }

        try {
            Cart::collectTotals();

            $this->validateOrder();

            $order = $this->orderRepository->create(Cart::prepareDataForOrder());

            $this->orderRepository->update(['status' => 'processing'], $order->id);

            if ($order->canInvoice()) {
                $this->invoiceRepository->create($this->prepareInvoiceData($order));
            }

            Cart::deActivateCart();

            //session()->flash('order', $order);

            $outputorder = $order->shipping_address;
            
            return response()->json([
                'success' => true,
                'outputorder' => $outputorder,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', trans('shop::app.common.error'));

            throw $e;
        }
    }

      /**
     * Prepares order's invoice data for creation.
     *
     * @param  \Webkul\Sales\Models\Order  $order
     * @return array
     */
    protected function prepareInvoiceData($order)
    {
        $invoiceData = ['order_id' => $order->id];

        foreach ($order->items as $item) {
            $invoiceData['invoice']['items'][$item->id] = $item->qty_to_invoice;
        }

        return $invoiceData;
    }

    /**
     * 
     * @link https://developer.paypal.com/docs/multiparty/checkout/save-payment-methods/during-purchase/js-sdk/paypal/
     * 
     */
    protected function buildRequestBody($input)
    {
        $cart = Cart::getCart();

        $billingAddressLines = $this->getAddressLines($cart->billing_address->address1);

        $data = [];



        $data = [
            'intent' => 'CAPTURE',
            'application_context' => [
                //'shipping_preference' => 'NO_SHIPPING',
                'shipping_preference' => 'GET_FROM_FILE', // 用户选择自己的地址内容
            ],
        
            'purchase_units' => [
                [
                    'amount'   => [
                        'value'         => $this->smartButton->formatCurrencyValue((float) $cart->sub_total + $cart->tax_total + ($cart->selected_shipping_rate ? $cart->selected_shipping_rate->price : 0) - $cart->discount_amount),
                        'currency_code' => $cart->cart_currency_code,

                        'breakdown'     => [
                            'item_total' => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) $cart->sub_total),
                            ],

                            'shipping'   => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) ($cart->selected_shipping_rate ? $cart->selected_shipping_rate->price : 0)),
                            ],

                            'tax_total'  => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) $cart->tax_total),
                            ],

                            'discount'   => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) $cart->discount_amount),
                            ],
                        ],
                    ],

                    'items'    => $this->getLineItems($cart),
                ],
            ],
        ];

        if (! empty($cart->billing_address->phone)) {
            $data['payer']['phone'] = [
                'phone_type'   => 'MOBILE',

                'phone_number' => [
                    'national_number' => $this->smartButton->formatPhone($cart->billing_address->phone),
                ],
            ];
        }

        if (
            $cart->haveStockableItems()
            && $cart->shipping_address
        ) {
            //$data['application_context']['shipping_preference'] = 'SET_PROVIDED_ADDRESS';

            /*
            $data['purchase_units'][0] = array_merge($data['purchase_units'][0], [
                'shipping' => [
                    'address' => [
                        'address_line_1' => current($billingAddressLines),
                        'address_line_2' => last($billingAddressLines),
                        'admin_area_2'   => $cart->shipping_address->city,
                        'admin_area_1'   => $cart->shipping_address->state,
                        'postal_code'    => $cart->shipping_address->postcode,
                        'country_code'   => $cart->shipping_address->country,
                    ],
                ],
            ]);
            */
        }
        $input['payment_vault'] = isset($input['payment_vault']) ? $input['payment_vault'] : "0";
        $paypal_vault = Session::get('paypal_vault');
        if($input['payment_vault']=='1') {
             // for vault
                if(empty($paypal_vault)) {
                    $data["payment_source"] = [
                        "paypal" => [
                            "attributes" => [
                                "vault" => [
                                    "store_in_vault" => "ON_SUCCESS",
                                    "usage_type" => "MERCHANT",
                                    "customer_type" => "CONSUMER"
                                ]
                            ],
                            "experience_context" => [
                                "return_url" => $input['payment_return_url'],
                                'cancel_url' => $input['payment_cancel_url'],
                            ]
                        ]
                    ];
                }else{
                    $data["payment_source"] = [
                        "paypal" => [
                            "vault_id" => $paypal_vault['id'],
                            "experience_context" => [
                                "return_url" => $input['payment_return_url'],
                                'cancel_url' => $input['payment_cancel_url'],
                            ]
                        ]
                    ];
                }
                // $data["payment_source"] = [
                //     "paypal" => [
                //         "attributes" => [
                //             "vault" => [
                //                 "store_in_vault" => "ON_SUCCESS",
                //                 "usage_type" => "MERCHANT",
                //                 "customer_type" => "CONSUMER"
                //             ]
                //         ],
                //         "experience_context" => [
                //             "return_url" => route("checkout.v4.product.page", ["slug" => "8987102380314"]),
                //             'cancel_url' => route("checkout.v4.product.page",["slug"=>"8987102380314"]),
                //         ]
                //     ]
                // ];


             
        }

        

        // if(!empty($paypal_vault)) {
        //     Log::info("paypal vault ". json_encode($paypal_vault));
        //     $data["payment_source"]["paypal"]["vault_id"] = $paypal_vault['id'];
        // }

        Log::info("post to paypal data ". json_encode($data));

        return $data;
    }

     /**
     * Return cart items.
     *
     * @param  string  $cart
     * @return array
     */
    protected function getLineItems($cart)
    {
        $lineItems = [];

        foreach ($cart->items as $item) {
            $lineItems[] = [
                'unit_amount' => [
                    'currency_code' => $cart->cart_currency_code,
                    'value'         => $this->smartButton->formatCurrencyValue((float) $item->price),
                ],
                'quantity'    => $item->quantity,
                'name'        => $item->name,
                'sku'         => $item->sku,
                'category'    => $item->getTypeInstance()->isStockable() ? 'PHYSICAL_GOODS' : 'DIGITAL_GOODS',
            ];
        }

        return $lineItems;
    }

      /**
     * Return convert multiple address lines into 2 address lines.
     *
     * @param  string  $address
     * @return array
     */
    protected function getAddressLines($address)
    {
        $address = explode(PHP_EOL, $address, 2);

        $addressLines = [current($address)];

        if (isset($address[1])) {
            $addressLines[] = str_replace(["\r\n", "\r", "\n"], ' ', last($address));
        } else {
            $addressLines[] = '';
        }

        return $addressLines;
    }

    /**
     * Validate order before creation.
     *
     * @return void|\Exception
     */
    public function validateOrder()
    {
        $cart = Cart::getCart();

        $minimumOrderAmount = core()->getConfigData('sales.order_settings.minimum_order.minimum_order_amount') ?: 0;

        if (
            auth()->guard('customer')->check()
            && auth()->guard('customer')->user()->is_suspended
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.suspended-account-message'));
        }

        if (
            auth()->guard('customer')->user()
            && ! auth()->guard('customer')->user()->status
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.inactive-account-message'));
        }

        if (! $cart->checkMinimumOrder()) {
            throw new \Exception(trans('shop::app.checkout.cart.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]));
        }

        if ($cart->haveStockableItems() && ! $cart->shipping_address) {
            throw new \Exception(trans('shop::app.checkout.cart.check-shipping-address'));
        }

        if (! $cart->billing_address) {
            throw new \Exception(trans('shop::app.checkout.cart.check-billing-address'));
        }

        if (
            $cart->haveStockableItems()
            && ! $cart->selected_shipping_rate
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.specify-shipping-method'));
        }

        if (! $cart->payment) {
            throw new \Exception(trans('shop::app.checkout.cart.specify-payment-method'));
        }
    }

    /***
     * 
     * 
     */

    public function checkout_success(Request $request) {
        

        $order = [];

        // check the payment info
        $order_id = $request->input('id');

        $orderTrans = $this->orderTransactionRepository->where('transaction_id', $order_id)->select(['order_id'])->first();
        if(!is_null($orderTrans)) {
            $order = $this->orderRepository->findOrFail($orderTrans->order_id);
        }else{
            $order = $this->orderRepository->findOrFail($order_id);
        }
        

        $fb_ids = config('onebuy.fb_ids');
        $ob_adv_id = config('onebuy.ob_adv_id');
        $crm_channel = config('onebuy.crm_channel');
        $refer = $request->session()->get('refer');
        $gtag = config('onebuy.gtag');

        $quora_adv_id = config('onebuy.quora_adv_id');

        $countries = config("countries");

        $default_country = config('onebuy.default_country');

        return view('onebuy::checkout-success', compact('order',
            "fb_ids",
            "ob_adv_id",
            "crm_channel",
            "refer",
            "gtag",
            "quora_adv_id",
            "countries",
            "default_country"
        ));


        return view('onebuy::checkout-success', compact('product','fb_ids','ob_adv_id'));
    }

    public function checkout_success_v4($order_id, Request $request) {
        $order = [];

        $orderTrans = $this->orderTransactionRepository->where('transaction_id', $order_id)->select(['order_id'])->first();
        if(!is_null($orderTrans)) {
            $order = $this->orderRepository->findOrFail($orderTrans->order_id);
        }else{
            $order = $this->orderRepository->findOrFail($order_id);
        }
        

        $fb_ids = config('onebuy.fb_ids');
        $ob_adv_id = config('onebuy.ob_adv_id');
        $crm_channel = config('onebuy.crm_channel');
        $refer = $request->session()->get('refer');
        $gtag = config('onebuy.gtag');
        $gtm = config('onebuy.gtm');

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

        $payment_airwallex_vault = $request->session()->get('payment_airwallex_vault');

        $payment_paypal_vault = $request->session()->get('payment_paypal_vault');


        $paypal_pay_acc = core()->getConfigData('sales.payment_methods.paypal_smart_button.client_id');
        $app_env = config("app.env");



        return view('onebuy::checkout-success-v4', compact('order',
            "fb_ids",
            "ob_adv_id",
            "crm_channel",
            "refer",
            "gtag",
            'gtm',
            "quora_adv_id",
            "countries",
            "default_country",
            "app_env",
            "order_pre",
            "paypal_id_token",
            "paypal_pay_acc",
            "payment_airwallex_vault",
            "payment_paypal_vault",
            "recommend_products"
        ));
    }

    public function checkout_success_v2($order_id, Request $request) {
        $order = [];

        $orderTrans = $this->orderTransactionRepository->where('transaction_id', $order_id)->select(['order_id'])->first();
        if(!is_null($orderTrans)) {
            $order = $this->orderRepository->findOrFail($orderTrans->order_id);
        }else{
            $order = $this->orderRepository->findOrFail($order_id);
        }
        

        $fb_ids = config('onebuy.fb_ids');
        $ob_adv_id = config('onebuy.ob_adv_id');
        $crm_channel = config('onebuy.crm_channel');
        $refer = $request->session()->get('refer');
        $gtag = config('onebuy.gtag');
        $gtm = config('onebuy.gtm');

        $quora_adv_id = config('onebuy.quora_adv_id');

        $countries = config("countries");

        $default_country = config('onebuy.default_country');
        $order_pre = config('shopify.order_pre');

        $recommend_products = [];

        return view('onebuy::checkout-success-v2', compact('order',
            "fb_ids",
            "ob_adv_id",
            "crm_channel",
            "refer",
            "gtag",
            'gtm',
            "quora_adv_id",
            "countries",
            "default_country",
            "order_pre",
            "recommend_products"
        ));
    }

    public function checkout_success_v1($order_id, Request $request) {
        $order = [];

        $orderTrans = $this->orderTransactionRepository->where('transaction_id', $order_id)->select(['order_id'])->first();
        if(!is_null($orderTrans)) {
            $order = $this->orderRepository->findOrFail($orderTrans->order_id);
        }else{
            $order = $this->orderRepository->findOrFail($order_id);
        }
        

        $fb_ids = config('onebuy.fb_ids');
        $ob_adv_id = config('onebuy.ob_adv_id');
        $crm_channel = config('onebuy.crm_channel');
        $refer = $request->session()->get('refer');
        $gtag = config('onebuy.gtag');
        $gtm = config('onebuy.gtm');

        $quora_adv_id = config('onebuy.quora_adv_id');

        $countries = config("countries");

        $default_country = config('onebuy.default_country');

        $recommend_products = [];

        return view('onebuy::checkout-success-v1', compact('order',
            "fb_ids",
            "ob_adv_id",
            "crm_channel",
            "refer",
            "gtag",
            'gtm',
            "quora_adv_id",
            "countries",
            "default_country",
            "recommend_products"
        ));
    }

    public function order_query(Request $request) {
        $order_id = $request->input("id");

        $order = $this->orderRepository->find($order_id);
        if(is_null($order)) {
            return new JsonResource([
                'order_id' => 0,
                'info'      => [],
            ]);
        }

        return new JsonResource([
            'order_id' => $order_id,
            'info'      => $order,
        ]);
    }

    public function recommended_query(Request $request) {

        $checkout_path = $request->input("checkout_path");

        //select four recommended products

        $shopify_store_id = config('shopify.shopify_store_id');


        $products = \Nicelizhi\Shopify\Models\ShopifyProduct::where("shopify_store_id",$shopify_store_id)->where("status", "active")->select(['product_id','title','handle',"variants","images"])->limit(10)->get();


        $recommended_info = [];

        $shopifyStore = Cache::get("shopify_store_".$shopify_store_id);

        if(empty($shopifyStore)){
            $shopifyStore = \Nicelizhi\Shopify\Models\ShopifyStore::where('shopify_store_id', $shopify_store_id)->first();
            Cache::put("shopify_store_".$shopify_store_id, $shopifyStore, 3600);
        }

        $i = 0;
        $max = 3;
        foreach($products as $key=> $product) {
            $images = $product->images;
            $variants = $product->variants;

            $online = \Webkul\Product\Models\Product::where("sku", $product->product_id)->first();
            if(is_null($online)) {
                continue;
            }

            if($i>=$max) {
                break;
            }

            $i++;

            $recommended_info[$key] = [
                "title" => $product->title,
                "handle" => $product->handle,
                "product_id" => $product->product_id,
                "discount_price" => $variants[0]['price'],
                "origin_price" => $variants[0]['compare_at_price'],
                "image_url" => $images[0]['src'],
                "url" => $shopifyStore->shopify_app_host_name . "/products/" . $product->handle
            ];
        }
 


        
        return new JsonResource([
            'checkout_path' => $checkout_path,
            'recommended_info' => $recommended_info,
            'currency_symbol' => core()->getCurrentCurrencyCode(),
            'recommended_info_title' => __('onebuy::app.You may also like')
        ]);

    }

    public function order_log(Request $request) {
        Log::info("request ". json_encode($request->all()));
        $session_data = $request->session()->all();
        Log::info("session ". json_encode($session_data));
        $refer = $request->cookie('refer');
        Log::info("cookie refer ". $refer);
    }
}
