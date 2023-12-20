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

class ProductController extends Controller
{
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

        //var_dump($product);exit;

        visitor()->visit($product);

        //return view('shop::products.view', compact('product'));


        // 四个商品的价格情况
        $package_products = [];
        /**
         * 
         * {   "id":5,
                "name":"2x {{ $product->name }}",
                "image":"{{ $productBaseImage['medium_image_url'] }}",
                "amount":"2",
                "old_price":"171.96",
                "new_price":"49.99",
                "tip1":"71% Savings",
                "tip2":"$24.99\/piece",
                "shipping_fee":"11.99",
                "popup_info":{
                    "name":null,
                    "old_price":null,
                    "new_price":null,
                    "img":null}
                },
         * 
         */
        
        $productBaseImage = product_image()->getProductBaseImage($product);
        // $package_product['id'] = 5;
        // $package_product['name'] = "2x" . $product->name;
        // $package_product['image'] = $productBaseImage['medium_image_url'];
        // $package_product['amount'] = 2;
        // $package_product['old_price'] = "3.15";
        // $package_product['new_price'] = "2.15";
        // $package_product['tip1'] = "71% Savings";
        // $package_product['tip2'] = "$24.99/piece";
        // $package_product['shipping_fee'] = 9.99;
        // $popup_info['name'] = null;
        // $popup_info['old_price'] = null;
        // $popup_info['new_price'] = null;
        // $popup_info['img'] = null;
        // $package_product['popup_info'] = $popup_info;
        // $package_products[] = $package_product;
        // $productBaseImage = product_image()->getProductBaseImage($product);

        // $package_product['id'] = 6;
        // $package_product['name'] = "1x" . $product->name;
        // $package_product['image'] = $productBaseImage['medium_image_url'];
        // $package_product['amount'] = 1;
        // $package_product['old_price'] = "4.33";
        // $package_product['new_price'] = "3.23";
        // $package_product['tip1'] = "71% Savings";
        // $package_product['tip2'] = "$24.99/piece";
        // $package_product['shipping_fee'] = 9.99;
        // $popup_info['name'] = null;
        // $popup_info['old_price'] = null;
        // $popup_info['new_price'] = null;
        // $popup_info['img'] = null;
        // $package_product['popup_info'] = $popup_info;
        // $package_products[] = $package_product;

        $package_products = $this->makeProducts($product, [2,1,3,4]);

        //var_dump($package_products);

        $product_attributes = [];

        //获取到他底部的商品内容
        $attributes = $this->productRepository->getSuperAttributes($product);
        //var_dump($attributes);exit;
        foreach($attributes as $key=>$attribute) {
            $attribute['name'] = $attribute['code'];
            $options = [];
            //var_dump($attribute);
            foreach($attribute['options'] as $kk=>$option) {
                //var_dump($option);

                // 获取商品图片内容
                if($attribute['id']==23) {
                    //var_dump($option, $product->sku);exit;
                    $new_sku = $product->sku."-variant-1-".$option['id']+5;
                    //echo $new_sku."\r\n";
                    $new_product = $this->productRepository->findByAttributeCode("sku", $new_sku);
                    //var_dump($new_product);exit;
                    //var_dump($new_sku);exit;
                    $NewproductBaseImage = product_image()->getProductBaseImage($new_product);
                    //var_dump($NewproductBaseImage);exit;
                    $option['image'] = @$NewproductBaseImage['medium_image_url'];
                }else{
                    $option['image'] = $productBaseImage['medium_image_url'];
                }


                //$option['image'] = $productBaseImage['medium_image_url'];
                $option['name'] = $option['admin_name'];
                unset($option['admin_name']);
                $options[] = $option;
                //var_dump($option);
            }
            unset($attribute['translations']); //去掉多余的数据内容
            //var_dump($options);
            $attribute['options'] = $options;
            $attribute['image'] = $productBaseImage['medium_image_url'];
            $product_attributes[] = $attribute;
        }

        //var_dump($product);
        // skus 数据
        $skus = [];
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
            

            $attribute_name = $ColorattributeOptions->admin_name.",".$SizeattributeOptions->admin_name;

            $sku['attribute_name'] = $attribute_name;
            $sku['attr_id'] = "24_".$colorAttribute['integer_value'].",23_".$sizeAttribute['integer_value'];

            $sku['key'] = $ColorattributeOptions->admin_name."_".$SizeattributeOptions->admin_name; // 这个数据需要留意他的位置，JS判断会需要使用
            
            $skus[] = $sku;
        }






        return view('onebuy::product-detail', compact('product','package_products', 'product_attributes', 'skus'));
    }

    // 完成订单生成动作
    public function order_add_sync(Request $request) {
        //var_dump($request->all());

        $input = $request->all();

        
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
            //$super_attribute[23] = 2;
            //$super_attribute[24] = 6;

            $product['super_attribute'] = $super_attribute;
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
        $addressData['billing']['phone'] = $input['phone_full'];
        $addressData['billing']['postcode'] = $input['code'];
        $addressData['billing']['state'] = $input['code'];
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

        //处理支付方式
        $payment = [];
        $payment['description'] = "Money Transfer";
        $payment['method'] = "moneytransfer";
        $payment['method_title'] = "Money Transfer";
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

        Cart::deActivateCart();

        Cart::activateCartIfSessionHasDeactivatedCartId();

        // 跳转到支付



        Cart::collectTotals();

        $cart = Cart::getCart();

        $data['result'] = 200;
        $data['order'] = $order;
        $data['client_secret'] = "https://payments.worldpay.com/app/hpp/integration/wpg/corporate?OrderKey=DEDATATOUSD%5E6582655c25f2de3e694ce86d&Ticket=00170347644542002FNq7X0ZyeHG0y3IjOQL32wTQJBLEHiKPXyn5rz&source=https%3A%2F%2Fsecure.worldpay.com%2Fsc7";

        return response()->json($data);

        /**
         * 
         * 
         * array(30) {
  ["first_name"]=>
  string(3) "Liu"
  ["second_name"]=>
  string(5) "Lizhi"
  ["email"]=>
  string(20) "nice.lizhi@gmail.com"
  ["phone_full"]=>
  string(13) "135 2408 4051"
  ["country"]=>
  string(2) "HK"
  ["city"]=>
  string(6) "大潭"
  ["province"]=>
  NULL
  ["address"]=>
  string(21) "datang road 255,ddddd"
  ["code"]=>
  string(6) "200000"
  ["product_delivery"]=>
  string(5) "10.99"
  ["product_price"]=>
  string(5) "42.99"
  ["total"]=>
  string(5) "53.98"
  ["amount"]=>
  string(1) "1"
  ["payment_return_url"]=>
  string(55) "http://45.79.79.208:8002/template-common/en/thankyou1/?"
  ["payment_cancel_url"]=>
  string(44) "http://45.79.79.208:8002/onebuy/operations-3"
  ["phone_prefix"]=>
  string(0) ""
  ["payment_method"]=>
  string(8) "worldpay"
  ["products"]=>
  array(1) {
    [0]=>
    array(4) {
      ["img"]=>
      string(92) "http://45.79.79.208:8002/cache/small/product/3/UyGkjcnr7Vt89NwRlmG3EEzk5PRY9TjT8gLRgHCg.webp"
      ["price"]=>
      string(7) "42.9900"
      ["amount"]=>
      int(1)
      ["product_id"]=>
      string(13) "8089213141227"
    }
  }
  ["logo_image"]=>
  string(67) "https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png"
  ["brand"]=>
  string(8) "Dotmalls"
  ["description"]=>
  string(15) "1x operations-3"
  ["shopify_store_name"]=>
  string(22) "lilndary.myshopify.com"
  ["produt_amount_base"]=>
  string(1) "1"
  ["domain_name"]=>
  string(12) "45.79.79.208"
  ["price_template"]=>
  string(6) "$price"
  ["omnisend"]=>
  string(8) "lilndary"
  ["payment_account"]=>
  string(5) "viusd"
  ["error"]=>
  bool(false)
  ["_token"]=>
  string(40) "EOdm1hHMBp9NRoDnKSAfYcpj6rtwHgDPbFgcWhQC"
  ["time"]=>
  string(13) "1702623252555"
}
         * 
         * 
         * 
         */
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
        $addressData['billing']['phone'] = $input['phone_full'];
        $addressData['billing']['postcode'] = $input['code'];
        $addressData['billing']['state'] = $input['code'];
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
     * 订单状态查询
     * 
     */
    public function order_status(Request $request) {

        try {
            $order = $this->smartButton->getOrder(request()->input('orderData.orderID'));
            // return response()->json($order);
            

            $order = (array)$order;

            //var_dump($order);

            $purchase_units = (array)$order['result']->purchase_units;
            $input = (array)$purchase_units[0]->shipping;
            $payer = (array)$order['result']->payer;

            //var_dump($payer, $input); exit;

            // 添加地址内容
            $addressData = [];
            $addressData['billing'] = [];
            $address1 = [];
            array_push($address1, $input['address']->address_line_1);
            $addressData['billing']['city'] = $input['address']->admin_area_1;
            $addressData['billing']['country'] = $input['address']->country_code;
            $addressData['billing']['email'] = $payer['email_address'];
            $addressData['billing']['first_name'] = $payer['name']->given_name;
            $addressData['billing']['last_name'] = $payer['name']->surname;
            $addressData['billing']['phone'] = "";
            $addressData['billing']['postcode'] = $input['address']->postal_code;
            $addressData['billing']['state'] = $input['address']->postal_code;
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

        $package_products = [];
        $productBaseImage = product_image()->getProductBaseImage($product);

        $productTypeInstance = $product->getTypeInstance();

        //$productPrice = $productTypeInstance->getProductPrices();

        //var_dump($productPrice);exit;

        //var_dump($productTypeInstance);exit;

        //$productResource = ProductResource::collection($product);
        
        foreach($nums as $key=>$i) {
            
            $package_product = [];
            $package_product['id'] = $i;
            $package_product['name'] = $i."x" . $product->name;
            $package_product['image'] = $productBaseImage['medium_image_url'];
            $package_product['amount'] = $i;
            //$package_product['old_price'] = $productPrice['regular']['price'] * $i;
            $package_product['old_price'] = "10.00" * $i;
            $package_product['new_price'] = "3.23" * $i;
            $package_product['tip1'] = "71% Savings";
            $package_product['tip2'] = "$24.99/piece";
            $package_product['shipping_fee'] = 9.99;
            $popup_info['name'] = null;
            $popup_info['old_price'] = null;
            $popup_info['new_price'] = null;
            $popup_info['img'] = null;
            $package_product['popup_info'] = $popup_info;
            $package_products[] = $package_product;
        }

        return $package_products;
        
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
}