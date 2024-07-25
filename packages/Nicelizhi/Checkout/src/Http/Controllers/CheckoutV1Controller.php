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


class CheckoutV1Controller extends Controller{

    private $cache_prefix_key = "checkout_v1_";
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

        //visitor()->visit($product);

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


    /**
     * 
     * 
     * 
     * 
     */
    public function success($order_id, Request $request) {
        $order = [];

        // check the payment info

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

        return view('checkout::product-order-success-'.$this->view_prefix_key, compact('order',"fb_ids","ob_adv_id","crm_channel","refer","gtag","quora_adv_id"));
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
        $cache_key = $this->cache_prefix_key.'product_ext_'.$product->id."_".count($nums);
        //echo $cache_key;
        $package_products = Cache::get($cache_key);

        //var_dump($package_products);exit;
        
        if(empty($package_products)) {

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
                
                $package_product['srouce_price'] = round($source_price*$i,2);
                $package_product['name'] = $i."x " . $product->name;
                $package_product['image'] = $productBaseImage['medium_image_url'];
                
                //$package_product['old_price'] = $productPrice['regular']['price'] * $i;
                $price = $this->getCartProductPrice($product,$product->id, $i);
                $package_product['old_price'] = $source_price * $i; 
                $package_product['old_price_format'] = "$".$package_product['old_price']; 
                //$package_product['new_price'] = "3.23" * $i;
                if ($i==2) $discount = 0.8;
                if ($i==3) $discount = 0.7;
                if ($i==4) $discount = 0.6;
                if ($i==1) $discount = 1;
                $package_product['new_price'] = $this->getCartProductPrice($product,$product->id, $i) * $discount;
                $package_product['new_price_format'] = "$".$package_product['new_price'] ;
                $tip1_price = (1 - round(($package_product['new_price'] / $package_product['old_price']), 2)) * 100;
                $package_product['tip1'] = $tip1_price."%";
                $tip2_price = round($package_product['new_price'] / $i, 2);
                $package_product['tip2'] = "$".$tip2_price;
                $package_product['per_product_price'] = $tip2_price;
                $shipping_fee = 9.99;
                // if($i==4) $shipping_fee = '0.00'; 先不开启免费
                $package_product['shipping_fee'] = $shipping_fee;
                $package_product['amount'] = round($package_product['new_price']+$shipping_fee, 2);
                $popup_info['name'] = null;
                $popup_info['old_price'] = null;
                $popup_info['new_price'] = null;
                $popup_info['img'] = null;
                $package_product['popup_info'] = $popup_info;
                $package_products[] = $package_product;
            }

            Cache::put($cache_key, json_encode($package_products), $this->cache_ttl);
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
        $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
        $attributes = $productViewHelper->getConfigurationConfig($product);
        $AddcartProduct = [];
        $AddcartProduct['quantity'] = $qty;
        foreach($attributes['attributes'] as $key=>$attribute) {
            $super_attribute[$attribute['id']] = $attribute['options'][0]['id'];
            $product_variant_id = $attribute['options'][0]['products'][0];
        }
        $AddcartProduct['selected_configurable_option'] = $product_variant_id;
        $AddcartProduct['super_attribute'] = $super_attribute;
        //$AddcartProduct['product_sku']

        $cart = Cart::addProduct($product['product_id'], $AddcartProduct);
        $cart = Cart::getCart();
        Cart::deActivateCart();

        return $cart->grand_total;

    }

    /**
     * 
     * 
     * 
     */
    public function downsell(Request $request) {


        $input = $request->all();

        Log::info("order checkout v2 ".json_encode($input));

        $products = $request->input("campaigns");

        $json_hidden_input = $request->input("json_hidden_input");

        $creditCardType = $request->input("creditCardType");

        // 添加到购物车
        Cart::deActivateCart();

        $products = json_decode($json_hidden_input);
        foreach($products as $key=>$product) {
            //var_dump($product);exit;
            $product = (array)$product; 
            $Addproduct['quantity'] = $product['qty'];
            $Addproduct['selected_configurable_option'] = $product['sku_id'];
            $super_attribute[23] = $product['color_camp'];
            $super_attribute[24] = $product['camp'];
            $Addproduct['super_attribute'] = $super_attribute;
            $Addproduct['product_id'] = $product['product_id'];
            $Addproduct['product_sku'] = $product['product_sku'];
            $cart = Cart::addProduct($product['product_id'], $Addproduct);
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
        array_push($address1, $input['shippingAddress1'].$input['shippingAddress2']);
        $addressData['billing']['city'] = $input['shippingCity'];
        $addressData['billing']['country'] = $input['shippingCountry'];
        $addressData['billing']['email'] = $input['email'];
        $addressData['billing']['first_name'] = $input['firstName'];
        $addressData['billing']['last_name'] = $input['lastName'];
        $addressData['billing']['phone'] = $input['phone'];
        $addressData['billing']['postcode'] = $input['shippingZip'];
        $addressData['billing']['state'] = $input['shippingState'];
        $addressData['billing']['use_for_shipping'] = true;
        $addressData['billing']['address1'] = $address1;
        $addressData['shipping'] = [];
        $addressData['shipping']['isSaved'] = false;
        $address1 = [];
        array_push($address1, "");
        $addressData['shipping']['address1'] = $address1;

        $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

        $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

        Log::info("paypal pay".json_encode($addressData));

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
                 'message' => "save shipping error"
             ]);
         }

         Cart::collectTotals();

         


        if($creditCardType=='paypal') {

            //处理支付方式
            $payment = [];
            $payment['description'] = "PayPal";
            $payment['method'] = "paypal_smart_button";
            $payment['method_title'] = "PayPal Smart Button";
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


            try {
                $order = $this->smartButton->createOrder($this->buildRequestBody());
                //Log::info("checkout v2 order id". $order->id);
                Log::info("checkout v2 order ". json_encode($order)); 
                $data = [];
                $data['order'] = $order;
                $data['code'] = 200;
                $data['result'] = 200;
                $data['success'] = true;
                $data['redirect'] = $order->result->links[1]->href;
                return response()->json($data);
            } catch (\Exception $e) {
                return response()->json($e->getMessage(), 400);
            }
        }

        if($creditCardType=='airwallex') {

                //处理支付方式
            $payment = [];
            $payment['description'] = "airwallex Transfer";
            $payment['method'] = "airwallex";
            $payment['method_title'] = "airwallex Transfer";
            $payment['sort'] = "2";
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
            Cart::deActivateCart();
            Cart::activateCartIfSessionHasDeactivatedCartId();


            $data['result'] = 200;
            $data['order'] = $order;
            if ($order) {

                $orderId = $order->id;

                Log::info("checkout v2 order id". $order->id);

                $transactionManager = $this->airwallex->createPaymentOrder($cart, $order->id);
                Log::info("transactionManager". json_encode($transactionManager));
                $data['client_secret'] = $transactionManager->client_secret;
                $data['payment_intent_id'] = $transactionManager->id;
                $data['currency'] = $transactionManager->currency;
                $data['transactionManager'] = $transactionManager;
                $data['country'] = $input['shippingCountry'];
                $data['success'] = true;
                $data['redirect'] = "https://www.baidu.com";
                $data['order_id'] = $orderId;
            }

            return response()->json($data);
           
        }

        if($creditCardType=='paypal-standard') {
            //处理支付方式
            $payment = [];
            $payment['description'] = "PayPal";
            $payment['method'] = "paypal_standard";
            $payment['method_title'] = "PayPal standard Button";
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

            if ($redirectUrl = Payment::getRedirectUrl($cart)) {
                $paypalStandard = app('Webkul\Paypal\Payment\Standard');
                $data = [];
                $data['success'] = true;
                $data['redirect'] = $redirectUrl;
                $data['redirect_url'] = $redirectUrl;
                $data['form'] =  $paypalStandard->getFormFields();
                $data['pay_url'] =  $paypalStandard->getPaypalUrl();
                
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


        return new JsonResource([
            'json' => json_decode($json_hidden_input),
            'products' => $products,
            'input' => $input
        ]);
        



       


       

        

        


        



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

    public function initialize(Request $request) {
        return new JsonResource([
            'success' => true,
        ]);
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

    public function cms($slug, Request $request) {


        $page = $this->cmsRepository->findByUrlKeyOrFail($slug);
        if(!is_null($page)) {
            return $page->html_content;
        }
        return "";

    }

    public function setGaClientId(Request $request) {
        $clientId = $request->input("clientId");
        $product_id = $request->input("product_id");

        $redis = Redis::connection('default');
        $redis->hset($this->cache_prefix_key."_access_".date("Ymd")."_".$product_id, $clientId, date("Y-m-d H:i:s"));
        
    }

}