<?php

namespace Nicelizhi\OneBuy\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;

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

        return view('onebuy::product-detail', compact('product'));
    }

    // 完成订单生成动作
    public function order_add_sync(Request $request) {
        var_dump($request->all());
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
}