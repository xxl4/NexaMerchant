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
use Nicelizhi\Airwallex\Core;
use Webkul\CartRule\Repositories\CartRuleRepository;
use \Webkul\Checkout\Repositories\CartRepository;


class ApiController extends Controller
{

    private $faq_cache_key = "faq";

    private $checkout_v2_cache_key = "checkout_v2_cache_";

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Paypal\Helpers\Ipn  $ipnHelper
     * @return void
     */
    public function __construct(
        protected SmartButton $smartButton,
        protected CartRepository $cartRepository,
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected AttributeRepository $attributeRepository,
        protected OrderRepository $orderRepository,
        protected InvoiceRepository $invoiceRepository,
        protected Airwallex $airwallex,
        protected CmsRepository $cmsRepository,
        protected CartRuleCouponRepository $cartRuleCouponRepository,
        protected CartRuleRepository $cartRuleRepository,
        protected ThemeCustomizationRepository $themeCustomizationRepository
    )
    {
        
    }

    public function productDetail($slug, Request $request) {

        $ip_country = $request->server('HTTP_CF_IPCOUNTRY');

        // currency by ip
        $currency = \Nicelizhi\OneBuy\Helpers\Utils::getCurrencyByCountry($ip_country);

        $currency_get = $request->input('currency');
        if(!empty($currency_get)) {
            core()->setCurrentCurrency($currency_get);
        }

      

        //var_dump($currency);exit;

        $data = Cache::get($this->checkout_v2_cache_key.$slug.$currency);
        $env = config("app.env");
        // when the env is pord use cache

        $paypal_id_token = $this->smartButton->getIDAccessToken();
        $paypal_access_token = $paypal_id_token->result->access_token;
        $paypal_id_token = $paypal_id_token->result->id_token;

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
            $data['sell-points'] = $redis->hgetall("sell_points_".$slug);
    
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

            // countdown
            //$countdown = $redis->hgetall("countdown_".$slug);
            $countdown = 5; // when 0 is not show
            $data['countdown'] = $countdown;

            // ad_message
            $data['ad_message']['text'] = "";
            // $data['ad_message']['color'] = "#FF0000";
            // $data['ad_message']['bg_color'] = "#FFFF00";
            // $data['ad_message']['href'] = "https://www.google.com";

            $data['ip_country'] = $ip_country;

            $data['currency'] = $currency;

            $data['customer_config'] = [];

            $checkoutItems = \Nicelizhi\Shopify\Helpers\Utils::getAllCheckoutVersion();
            $customer_config = [];
            foreach($checkoutItems as $key=>$item) {
                $cachek_key = "checkout_".$item."_".$slug;
                $cacheData = $redis->get($cachek_key);
                $customer_config[$item] = json_decode($cacheData);
            }

            $data['customer_config'] = $customer_config;


            Cache::put($this->checkout_v2_cache_key.$slug, json_encode($data));

            $data['paypal_id_token'] = $paypal_id_token;
            $data['paypal_access_token'] = $paypal_access_token;




            return response()->json($data);

        }

        
        //json decode to array

        $data = json_decode($data);
        $data = (array)$data;
        $data['paypal_id_token'] = $paypal_id_token;
        $data['paypal_access_token'] = $paypal_access_token;
        

        return response()->json($data);
    }

    /**
     * Create a order from cart
     *
     * @return void
     */
    public function OrderAddSync(Request $request) {

        $payment_method = $request->input('payment_method');
        $payment_method_input = $request->input('payment_method');
        $input = $request->all();
        $refer = isset($input['refer']) ? trim($input['refer']) : "";

        $products = $request->input("products");
        // 
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

        $this->returnInsurance($input, $cart);


        // 
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
                'redirect' => false,
                'data'     => Cart::getCart(),
            ]);
        }



        //
        $shippingMethod = "free_free"; // free shipping
        $shippingMethod = "flatrate_flatrate";

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


        if($payment_method_input=="airwallex_klarna") $payment_method = "airwallex";
        if($payment_method_input=="airwallex_dropin") $payment_method = "airwallex";
        if($payment_method_input=="airwallex_google") $payment_method = "airwallex";
        if($payment_method_input=="airwallex_apple") $payment_method = "airwallex";
        if($payment_method_input=="airwallex") $payment_method = "airwallex";

        $couponCode = $input['coupon_code'];
        try {
            if (strlen($couponCode)) {
                $coupon = $this->cartRuleCouponRepository->findOneByField('code', $couponCode);

                if (! $coupon) {
                    return (new JsonResource([
                        'data'     => new CartResource(Cart::getCart()),
                        'message'  => trans('Coupon not found.'),
                    ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                if ($coupon->cart_rule->status) {
                    if (Cart::getCart()->coupon_code == $couponCode) {
                        return (new JsonResource([
                            'data'     => new CartResource(Cart::getCart()),
                            'message'  => trans('shop::app.checkout.cart.coupon-already-applied'),
                        ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                    }

                    Cart::setCouponCode($couponCode);
                    //$this->validateOrder();
                    Cart::collectTotals();
                }
            }
        } catch (\Exception $e) {
            return (new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.coupon.error'),
            ]))->response()->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // when enable the upselling and can config the upselling rule for carts
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

            
            Cart::collectTotals();
            $this->validateOrder();
            $cart = Cart::getCart();

            // when enable the upselling and can config the upselling rule for carts
            if(config("Upselling.enable")) {
               
                $upselling = app('NexaMerchant\Upselling\Upselling');
                $upselling->applyUpselling($cart);
            }

            $order = $this->orderRepository->create(Cart::prepareDataForOrder());
            // Cart::deActivateCart();
            // Cart::activateCartIfSessionHasDeactivatedCartId();
            $data['result'] = 200;
            $data['order'] = $order;
            if ($order) {
                $orderId = $order->id;

                //customer id
                $cus_id = isset($input['cus_id']) ? trim($input['cus_id']) : null;

                $airwallex_customer = [];
                if(is_null($cus_id)) {
                    //Step 1: Create a Customer
                    try {
                        $airwallex_customer = $this->airwallex->createCustomer($cart, $order->id);
                        $cus_id = $airwallex_customer->id;
                    } catch (\Exception $e) {
                        return response()->json(['error' => $e->getMessage(),'code'=>'203'], 400);
                    }
                    // $airwallex_customer = $this->airwallex->createCustomer($cart, $order->id);
                    // $cus_id = $airwallex_customer->id;
                }else{
                    $airwallex_customer['id'] = $cus_id;
                }

                //create a airwallex payment order
                $transactionManager = $this->airwallex->createPaymentOrder($cart, $order->id, $cus_id);
                //Step 2: Generate a client secret for the Customer
                $customerClientSecret = $this->airwallex->createCustomerClientSecret($cus_id);
                if(!isset($transactionManager->client_secret)) {
                    response()->json(['error' => $transactionManager->body->message,'code'=>'203'], 400);
                }

                //$transactionManager = $this->airwallex->createPaymentOrder($cart, $order->id);
                Log::info("airwallex-".$order->id."--".json_encode($transactionManager));
                $data['client_secret'] = $transactionManager->client_secret;
                $data['payment_intent_id'] = $transactionManager->id;
                $data['currency'] = $transactionManager->currency;
                $data['transaction'] = $transactionManager;
                $data['customer'] = $airwallex_customer;
                $data['customer_client_secret'] = $customerClientSecret;
                $data['country'] = $input['country'];
                $data['billing'] = $addressData['billing'];

                // redis save the customer id from airwallex
                Redis::set("airwallex_customer_".$order->id, $cus_id);
            }

            return response()->json($data);
        }

    }

    public function OrderAddrAfter(Request $request) {
        $input = $request->all();

        //$last_order_id = $request->session()->get('last_order_id'); // check the laster order id
        $last_order_id = "";
        //$last_order_id = "ddddd";
        $force = $request->input("force");

        Log::info("last order id " . $last_order_id);

        if(!empty($last_order_id) && $force !="1") {
            return response()->json(['error' => 'You Have already placed order, if you want to place another order please confirm your order','code'=>'202'], 400);
        }


        $refer = isset($input['refer']) ? trim($input['refer']) : "";

        $products = $request->input("products");
        Log::info("products". json_encode($products));
        Cart::deActivateCart();
        foreach($products as $key=>$product) {
            //var_dump($product);
            if(!isset($product['amount'])) continue; // when the amount eq 0
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

        $this->returnInsurance($input, $cart);


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


        $couponCode = $input['coupon_code'];
        try {
            if (strlen($couponCode)) {
                $coupon = $this->cartRuleCouponRepository->findOneByField('code', $couponCode);

                if (! $coupon) {
                    return (new JsonResource([
                        'data'     => new CartResource(Cart::getCart()),
                        'message'  => trans('Coupon not found.'),
                    ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                if ($coupon->cart_rule->status) {
                    if (Cart::getCart()->coupon_code == $couponCode) {
                        return (new JsonResource([
                            'data'     => new CartResource(Cart::getCart()),
                            'message'  => trans('shop::app.checkout.cart.coupon-already-applied'),
                        ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                    }

                    Cart::setCouponCode($couponCode);
                    Cart::collectTotals();

                }
            }
        } catch (\Exception $e) {
            return (new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.coupon.error'),
            ]))->response()->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // when enable the upselling and can config the upselling rule for carts
        if(config("Upselling.enable")) {
               
            $upselling = app('NexaMerchant\Upselling\Upselling');
            $upselling->applyUpselling($cart);
        }


        try {
            $order = $this->smartButton->createOrder($this->buildRequestBody($input));
            $data = [];
            $data['order'] = $order;
            $data['code'] = 200;
            $data['result'] = 200;
            $data['cart'] = Cart::getCart();
            return response()->json($data);
            //return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(json_decode($e->getMessage()), 400);
        }
    }

    /**
     * Order confirm
     *
     * @return \Illuminate\Http\Response
     */
    public function OrderConfirm(Request $request) {
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

    public function OrderLog(Request $request) {
        Log::info("request ". json_encode($request->all()));
        $session_data = $request->session()->all();
        Log::info("session ". json_encode($session_data));
        $refer = $request->cookie('refer');
        Log::info("cookie refer ". $refer);
    }

    public function OrderQuery(Request $request) {
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

    public function OrderStatus(Request $request) {
        try {
            $order = $this->smartButton->getOrder(request()->input('orderData.orderID'));

            $cartId = $request->input('orderData.cartId');
            if(empty($cartId)) {
                $cartId = $request->input('data.cart.id');
            }

            if(!empty($cartId)) {
                
                $cart = $this->cartRepository->find($cartId);
                Cart::setCart($cart);
                
            }

            $refer = $request->input("refer");

        
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
    
                //$request->session()->put('last_order_id', request()->input('orderData.orderID'));

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
    

            }

            $orderRes = $this->saveOrder();

            // get order transaction info
            $order = $this->orderRepository->find($orderRes->id);

            $data = [];
            $data['order'] = $order;
            $data['transaction'] = $order->transactions;
            $data['code'] = 200;
            $data['result'] = 200;
            $data['order_id'] = $orderRes->id;

            return response()->json($data);

        } catch (\Exception $e) {
            Log::info("paypal pay exception". json_encode($e->getMessage()));
            return response()->json($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
    }


    private function returnInsurance($input, $cart) {
        // when return insurance eq 1 and auto add the insurance product into cart 
        $input['return_insurance'] = isset($input['return_insurance']) ? $input['return_insurance'] : 0; 
        if($input['return_insurance']==1) {

            Cart::addProduct(config('onebuy.return_shipping_insurance.product_id'), [
                'quantity' =>1 ,
                'product_sku' => config('onebuy.return_shipping_insurance.product_sku'),
                'selected_configurable_option' => '',
                'product_id' => config('onebuy.return_shipping_insurance.product_id'),
                'variant_id' => ''
            ]);


        }

    }

    /**
     * 
     * check the coupon info
     * @param string code
     * 
     */
    public function CheckCoupon(Request $request) {
        $couponCode = $request->input("code");

        try {
            if (strlen($couponCode)) {
                $coupon = $this->cartRuleCouponRepository->findOneByField('code', $couponCode);

                if (! $coupon) {
                    return (new JsonResource([
                        'data'     => new CartResource(Cart::getCart()),
                        'message'  => trans('Coupon not found.'),
                    ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                $couponConfig = [];

                $couponConfig = $this->cartRuleRepository->findOneByField('id',$coupon->cart_rule_id);

                return (new JsonResource([
                    'data'     => [
                        'coupon' => $coupon,
                        'couponConfig' => $couponConfig,
                    ],
                    'message'  => trans('Coupon applied successfully.'),
                ]))->response()->setStatusCode(Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            return (new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.coupon.error'),
            ]))->response()->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
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

            return $order;

            //session()->flash('order', $order);

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 400);
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
        $paypal_vault_id = isset($input['paypal_vault_id']) ? $input['paypal_vault_id'] : "";
        if($input['payment_vault']=='1') {
             // for vault
                if(empty($paypal_vault_id)) {
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
                            "vault_id" => $paypal_vault_id,
                            "experience_context" => [
                                "return_url" => $input['payment_return_url'],
                                'cancel_url' => $input['payment_cancel_url'],
                            ]
                        ]
                    ];
                }             
        }

        //var_dump($data);exit;

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
            if(empty($item->name)) $item->name = "Product";
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


    /**
     * 
     * 
     * faq interface
     * 
     * 
     */

    public function faq() {

        $redis = Redis::connection('default');
        $faqItems = $redis->hgetall($this->faq_cache_key);
        ksort($faqItems);

        return response()->json([
            'data' => (array)$faqItems,
            'code' => 200,
            'message' => 'success'
        ], 200);
        
    }

    /**
     * 
     * 
     */
    public function cms($slug, Request $request) {
        $page = $this->cmsRepository->findByUrlKeyOrFail($slug);

        return response()->json([
            'data' => $page,
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

}