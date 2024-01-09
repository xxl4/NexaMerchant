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
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Product\Helpers\View;
use Nicelizhi\Airwallex\Payment\Airwallex;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;


class CheckoutV1Controller extends Controller{

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
            Cache::put($cache_key, json_encode($skus), 36000);
        }else {
            $skus = json_decode($skus, JSON_OBJECT_AS_ARRAY);
        }

        $productBgAttribute = "";
        $productBgAttribute_mobile = "";

        $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
        $attributes = $productViewHelper->getConfigurationConfig($product);

        //var_dump($attributes);exit;





        return view('checkout::product-detail-checkoutv1', compact('product','package_products', 'product_attributes', 'skus','productBgAttribute','productBgAttribute_mobile', 'attributes'));

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
                $package_product['srouce_price'] = $source_price;
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
                $package_product['tip1'] = $tip1_price."% Savings";
                $tip2_price = $package_product['new_price'] / $i;
                $package_product['tip2'] = "$".$tip2_price;
                $shipping_fee = 9.99;
                if($i==4) $shipping_fee = '0.00';
                $package_product['shipping_fee'] = $shipping_fee;
                $package_product['amount'] = $package_product['new_price']+$shipping_fee;
                $popup_info['name'] = null;
                $popup_info['old_price'] = null;
                $popup_info['new_price'] = null;
                $popup_info['img'] = null;
                $package_product['popup_info'] = $popup_info;
                $package_products[] = $package_product;
            }

            Cache::put($cache_key, json_encode($package_products), 36000);
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

        Log::info("order addr after ".json_encode($input));

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


        if($creditCardType=='paypal') {
            try {
                $order = $this->smartButton->createOrder($this->buildRequestBody());
                $data = [];
                $data['order'] = $order;
                $data['code'] = 200;
                $data['result'] = 200;
                $data['success'] = true;
                $data['redirect'] = $order->result->links[1]->href;
                return response()->json($data);
            } catch (\Exception $e) {
                return response()->json(json_decode($e->getMessage()), 400);
            }
        }


        return new JsonResource([
            'json' => json_decode($json_hidden_input),
            'products' => $products,
            'input' => $input
        ]);
        



       


       

        

        


        



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

}