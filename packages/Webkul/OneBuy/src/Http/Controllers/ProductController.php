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
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected AttributeRepository $attributeRepository,
        protected OrderRepository $orderRepository,
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
        $package_product['id'] = 5;
        $package_product['name'] = "2x" . $product->name;
        $package_product['image'] = $productBaseImage['medium_image_url'];
        $package_product['amount'] = 2;
        $package_product['old_price'] = "3.15";
        $package_product['new_price'] = "2.15";
        $package_product['tip1'] = "71% Savings";
        $package_product['tip2'] = "$24.99/piece";
        $package_product['shipping_fee'] = 4;
        $popup_info['name'] = null;
        $popup_info['old_price'] = null;
        $popup_info['new_price'] = null;
        $popup_info['img'] = null;
        $package_product['popup_info'] = $popup_info;
        $package_products[] = $package_product;
        $productBaseImage = product_image()->getProductBaseImage($product);
        $package_product['id'] = 6;
        $package_product['name'] = "1x" . $product->name;
        $package_product['image'] = $productBaseImage['medium_image_url'];
        $package_product['amount'] = 1;
        $package_product['old_price'] = "4.33";
        $package_product['new_price'] = "3.23";
        $package_product['tip1'] = "71% Savings";
        $package_product['tip2'] = "$24.99/piece";
        $package_product['shipping_fee'] = 3;
        $popup_info['name'] = null;
        $popup_info['old_price'] = null;
        $popup_info['new_price'] = null;
        $popup_info['img'] = null;
        $package_product['popup_info'] = $popup_info;
        $package_products[] = $package_product;

        //var_dump($package_products);

        $product_attributes = [];

        //获取到他底部的商品内容
        $attributes = $this->productRepository->getSuperAttributes($product);
        foreach($attributes as $key=>$attribute) {
            $attribute['name'] = $attribute['code'];
            $options = [];
            foreach($attribute['options'] as $kk=>$option) {
                //var_dump($option);
                $option['image'] = $productBaseImage['medium_image_url'];
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

            //return response()->json($cart);
            //var_dump($cart);

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


        Cart::saveCustomerAddress($addressData);

        //处理配送方式
        $shippingMethod = "free_free";
        Cart::saveShippingMethod($shippingMethod);

        //处理支付方式
        $payment = [];
        $payment['description'] = "Cash On Delivery";
        $payment['method'] = $input['payment_method'];
        $payment['method_title'] = "Cash On Delivery";
        $payment['sort'] = "1";
        Cart::savePaymentMethod($payment);
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

        return response()->json($cart );

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

    public function order_addr_after(Request $request) {

        

        return response()->json($request->all());
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