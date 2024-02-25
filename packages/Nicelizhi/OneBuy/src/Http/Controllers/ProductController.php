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
            Cache::put($cache_key, $product, 3600);
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
        }else{
            $refer = $request->session()->get('refer');
        }

        

        //var_dump($product);exit;

        // 四个商品的价格情况
        $package_products = [];
        $productBaseImage = product_image()->getProductBaseImage($product);
        $package_products = $this->makeProducts($product, [2,1,3,4]);


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

                $qty_items_color[$ColorattributeOptions->admin_name][] = $SizeattributeOptions->admin_name;
                $qty_items_size[$SizeattributeOptions->admin_name][] = $ColorattributeOptions->admin_name;
                
                $skus[] = $sku;
            }
            Cache::put($cache_key, json_encode($skus), 36000);
            Cache::put($size_cache_key, json_encode($qty_items_size), 36000);
            Cache::put($color_cache_key, json_encode($qty_items_color), 36000);
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
            
            Cache::put($cache_key_1, $product_category_id, 36000);
        }else{
            //$product_category = json_decode($product_category);
            //var_dump($product_category);exit;
            $product_category_id = intval($product_category);
        }

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
                $attribute['image'] = $productBaseImage['large_image_url'];
                $attribute['large_image'] = $productBaseImage['large_image_url'];
                $product_attributes[] = $attribute;
            }

            Cache::put($cache_key, json_encode($product_attributes), 36000);

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
        //获取 paypal smart key
        $paypal_client_id = core()->getConfigData('sales.payment_methods.paypal_smart_button.client_id');


        //支持的区域
        $countries = config("countries");

        $default_country = config('onebuy.default_country');

        $airwallex_method = config('onebuy.airwallex.method');

        $payments = config('onebuy.payments'); // config the payments status

        $payments_default = config('onebuy.payments_default');
        $brand = config('onebuy.brand');

        //var_dump($default_country);exit;

        return view('onebuy::product-detail', compact('app_env','product','package_products', 'product_attributes', 'skus','productBgAttribute','productBgAttribute_mobile','faqItems','comments','paypal_client_id','default_country','airwallex_method','payments','payments_default','brand'));
    }

    public function cms($slug, Request $request) {
       // \Debugbar::disable(); /* 开启后容易出现前端JS报错的情况 */

        $page = $this->cmsRepository->findByUrlKeyOrFail($slug);
        
        return view('onebuy::cms.page')->with('page', $page);

    }

    // 完成订单生成动作
    public function order_add_sync(Request $request) {
        //var_dump($request->all());

        $payment_method = $request->input('payment_method');

        $input = $request->all();

        $refer = $request->session()->get('refer');
        Log::info("refer checkout v1 ".$refer);

        
        $products = $request->input("products");
        // 添加到购物车
        Cart::deActivateCart();
        foreach($products as $key=>$product) {
            //var_dump($product);
            $product['quantity'] = $product['amount'];
            $product['selected_configurable_option'] = $product['variant_id'];
            $attr_ids = explode(',', $product['attr_id']);
            foreach($attr_ids as $key=>$attr_id) {
                $attr = explode('_', $attr_id);
                $super_attribute[$attr[0]] = $attr[1];
            }
            $product['super_attribute'] = $super_attribute;
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
        //undefined+
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


        //return response()->json($addressData);

        //var_dump($addressData);exit;


        //Cart::saveCustomerAddress($addressData);

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

        if($payment_method=="airwallex_klarna") $payment_method = "airwallex";
        if($payment_method=="airwallex_dropin") $payment_method = "airwallex";

        // 获取支付信息
        
        if($payment_method=='airwallex') {
            //处理支付方式
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

            // 生成订单，
            Cart::collectTotals();
            $this->validateOrder();
            $cart = Cart::getCart();
            $order = $this->orderRepository->create(Cart::prepareDataForOrder());
            // Cart::deActivateCart();
            // Cart::activateCartIfSessionHasDeactivatedCartId();
            // 跳转到支付
            $data['result'] = 200;
            $data['order'] = $order;
            if ($order) {
                $orderId = $order->id;
                $transactionManager = $this->airwallex->createPaymentOrder($cart, $order->id);

                $data['client_secret'] = $transactionManager->client_secret;
                $data['payment_intent_id'] = $transactionManager->id;
                $data['currency'] = $transactionManager->currency;
                $data['country'] = $input['country'];
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

            $order = $this->orderRepository->create(Cart::prepareDataForOrder());

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
            }

            // $order = $this->orderRepository->create(Cart::prepareDataForOrder());

            // Cart::deActivateCart();

            // Cart::activateCartIfSessionHasDeactivatedCartId();

            // session()->flash('order', $order);

            // return new JsonResource([
            //     'success'       => true,
            //     'redirect'     => true,
            //     'redirect_url' => route('shop.checkout.onepage.success'),
            // ]);
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

        Log::info("order addr after ".json_encode($input));

        $refer = $request->session()->get('refer');
        Log::info("refer checkout v1 ".$refer);

        $products = $request->input("products");
        // 添加到购物车
        Cart::deActivateCart();
        foreach($products as $key=>$product) {
            //var_dump($product);
            $product['quantity'] = $product['amount'];
            $product['selected_configurable_option'] = $product['variant_id'];
            $attr_ids = explode(',', $product['attr_id']);
            foreach($attr_ids as $key=>$attr_id) {
                $attr = explode('_', $attr_id);
                $super_attribute[$attr[0]] = $attr[1];
            }

            $product['super_attribute'] = $super_attribute;
            Log::info("add product into cart ". json_encode($product));
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

        if (
            Cart::hasError()
            || ! $payment
            || ! Cart::savePaymentMethod($payment)
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }


        /*
        Cart::collectTotals();

        $this->validateOrder();

        $cart = Cart::getCart();

        $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        Cart::deActivateCart();

        Cart::activateCartIfSessionHasDeactivatedCartId();
        */

        try {
            $order = $this->smartButton->createOrder($this->buildRequestBody());
            $data = [];
            $data['order'] = $order;
            $data['code'] = 200;
            $data['result'] = 200;
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(json_decode($e->getMessage()), 400);
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

        $order = $this->orderRepository->find($order_id);
        
        $transactionManager = $this->airwallex->confirmPayment($payment_intent_id, $order);

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
     * 
     */
    public function order_status(Request $request) {

        $refer = $request->session()->get('refer');
        Log::info("refer checkout v1 ".$refer);

        try {
            $order = $this->smartButton->getOrder(request()->input('orderData.orderID'));
            // return response()->json($order);
            

            Log::info("paypal ".json_encode($order));
            Log::info("paypal request ".json_encode($request->all()));

            $order = (array)$order;

            //var_dump($order);

            $purchase_units = (array)$order['result']->purchase_units;
            $input = (array)$purchase_units[0]->shipping;
            $payer = (array)$order['result']->payer;
            $payment_source = (array)$order['result']->payment_source;
            $payment_source_paypal = (array)$payment_source['paypal'];

            Log::info("paypal source".json_encode($payment_source));
            Log::info("paypal source paypal".json_encode($payment_source_paypal));

            // 添加地址内容
            $addressData = [];
            $addressData['billing'] = [];
            $address1 = [];
            array_push($address1, $input['address']->address_line_1);
            $addressData['billing']['city'] = isset($input['address']->admin_area_1) ? $input['address']->admin_area_1 : "";
            $addressData['billing']['country'] = $input['address']->country_code;
            $addressData['billing']['email'] = $payer['email_address'];
            $addressData['billing']['first_name'] = $payer['name']->given_name;
            $addressData['billing']['last_name'] = $payer['name']->surname;
            $national_number = isset($payment_source_paypal['phone_number']) ? $payment_source_paypal['phone_number']->national_number : "";
            $addressData['billing']['phone'] =  $national_number;
            $addressData['billing']['postcode'] = isset($input['address']->postal_code) ? $input['address']->postal_code : "";
            $addressData['billing']['state'] = isset($input['address']->admin_area_2) ? $input['address']->admin_area_2 : "";
            $addressData['billing']['use_for_shipping'] = true;
            $addressData['billing']['address1'] = $address1;
            $addressData['shipping'] = [];
            $addressData['shipping']['isSaved'] = false;
            $address1 = [];
            array_push($address1, "");
            $addressData['shipping']['address1'] = $address1;

            $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

            $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

            Log::info("address data-".$refer.'--'.json_encode($addressData));

            if (
                Cart::hasError()
                || ! Cart::saveCustomerAddress($addressData)
            ) {
                return new JsonResource([
                    'redirect' => true,
                    'data'     => route('shop.checkout.cart.index'),
                ]);
            }

            $this->smartButton->captureOrder(request()->input('orderData.orderID'));
            return $this->saveOrder();
        } catch (\Exception $e) {
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

            session()->flash('order', $order);

            return response()->json([
                'success' => true,
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

    protected function buildRequestBody()
    {
        $cart = Cart::getCart();

        $billingAddressLines = $this->getAddressLines($cart->billing_address->address1);

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
     * 
     * generation products for page
     * @param product
     * @param array nums
     * 
     */

    private function makeProducts($product, $nums = array()) {

        //var_dump($product->id);exit;
        $cache_key = "product_ext_".$product->id."_".count($nums);
        $package_products = Cache::get($cache_key);

        $shipping_price_key = "shipping_price";
        
        if(empty($package_products)) {
        //if(empty($package_products)) {
        //if($package_products) {
            $package_products = [];
            $productBaseImage = product_image()->getProductBaseImage($product);
    
            //source price
    
            $productBgAttribute_price = $this->productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 31,
            ]);
            $source_price = 0;
            if(!is_null($productBgAttribute_price)) $source_price = $productBgAttribute_price->float_value;
            if(empty($source_price)) {
                return abort(404);
            }
    
            foreach($nums as $key=>$i) {
                
                $package_product = [];
                $package_product['id'] = $i;
                $package_product['name'] = $i."x " . $product->name;
                $package_product['image'] = $productBaseImage['medium_image_url'];
                $package_product['amount'] = $i;
                //$package_product['old_price'] = $productPrice['regular']['price'] * $i;
                $price = $this->getCartProductPrice($product,$product->id, $i);
                $package_product['old_price'] = round($source_price * $i, 2); 
                $package_product['old_price_format'] = core()->currency($package_product['old_price']); 
                //$package_product['new_price'] = "3.23" * $i;
                if ($i==2) $discount = 0.8;
                if ($i==3) $discount = 0.7;
                if ($i==4) $discount = 0.6;
                if ($i==1) $discount = 1;
                $package_product['new_price'] = $this->getCartProductPrice($product,$product->id, $i) * $discount;
                $package_product['new_price_format'] = core()->currency($package_product['new_price']) ;
                $tip1_price = (1 - round(($package_product['new_price'] / $package_product['old_price']), 2)) * 100;
                $package_product['tip1'] = $tip1_price."% ";
                $tip2_price = round($package_product['new_price'] / $i, 2);
                $package_product['tip2'] = core()->currency($tip2_price)."/";
                $package_product['shipping_fee'] = 9.99;
                $popup_info['name'] = null;
                $popup_info['old_price'] = null;
                $popup_info['new_price'] = null;
                $popup_info['img'] = null;
                $package_product['popup_info'] = $popup_info;
                $package_products[] = $package_product;
            }

            Cache::put($cache_key, json_encode($package_products), 36000);
            //var_dump("hello");
            return $package_products;
        }
        
        return json_decode($package_products, JSON_OBJECT_AS_ARRAY);
    }

    /**
     * 
     * 
     * 计算商品在具体的数量的时候的价格，主要是考虑到会有购物车折扣的情况下
     * 
     * @param int $product_id
     * @param int $qty
     * 
     * @return float price
     * 
     */
    private function getCartProductPrice($product, $product_id, $qty) {
        //清空购车动作
        Cart::deActivateCart();
        //添加对应的商品到购物车中

        $variant = $product->getTypeInstance()->getDefaultVariant();

        //$product_variant = $this->productRepository->where("parent_id", $product->id)->get();

        $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();

        $attributes = $productViewHelper->getConfigurationConfig($product);

        //var_dump($attributes);exit;


        $AddcartProduct = [];
        
        $AddcartProduct['quantity'] = $qty;
        
        foreach($attributes['attributes'] as $key=>$attribute) {
            $super_attribute[$attribute['id']] = $attribute['options'][0]['id'];
            $product_variant_id = $attribute['options'][0]['products'][0];
        }

        $AddcartProduct['selected_configurable_option'] = $product_variant_id;
        $AddcartProduct['super_attribute'] = $super_attribute;
        //var_dump($super_attribute);exit;

        //var_dump($AddcartProduct);exit;
        // $attr_ids = explode(',', $product['attr_id']);
        // foreach($attr_ids as $key=>$attr_id) {
        //     $attr = explode('_', $attr_id);
        //     $super_attribute[$attr[0]] = $attr[1];
        // }

        //$AddcartProduct['super_attribute'] = $super_attribute;
        //var_dump($AddcartProduct);exit;
        
        $cart = Cart::addProduct($product['product_id'], $AddcartProduct);

        //获取购车中商品价格返回
        $cart = Cart::getCart();

        //var_dump($cart); exit;

        //清空购车动作
        Cart::deActivateCart();

        return $cart->grand_total;

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
        \Debugbar::disable(); /* 开启后容易出现前端JS报错的情况 */
        $product = [];
        return view('onebuy::checkout-success', compact('product'));
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
        $recommended_info = [];
        return new JsonResource([
            'checkout_path' => $checkout_path,
            'recommended_info' => $recommended_info,
            'recommended_info_title' => 'recommended_info_title'
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