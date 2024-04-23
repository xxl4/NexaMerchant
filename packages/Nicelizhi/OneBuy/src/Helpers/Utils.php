<?php
namespace Nicelizhi\OneBuy\Helpers;
use GuzzleHttp\Client;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Attribute\Models\AttributeOptionTranslation;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Illuminate\Support\Facades\Cache;
use Webkul\Checkout\Facades\Cart;

final class Utils {


    /**
     * 
     * @param Products $product
     * @param array $nums
     * @return void
     * 
     */
    public static function makeProducts($product, $nums = array()) {
        $currency = core()->getCurrentCurrencyCode();
        $cache_key = "product_ext_".$product->id."_".count($nums)."_".$currency;
        $package_products = Cache::get($cache_key);

        $shipping_price_key = "shipping_price"."_".$currency;
        $shipping_price = Cache::get($shipping_price_key);
        //var_dump($shipping_price);
        if(empty($shipping_price)) {
            $shipping_price = core()->getConfigData('sales.carriers.flatrate.default_rate');
            $shipping_price = core()->convertPrice($shipping_price);
            Cache::put($shipping_price_key, $shipping_price);
        }
        if(empty($package_products)) {
            $package_products = [];
            $productBaseImage = product_image()->getProductBaseImage($product);
    
            //source price
            $productAttributeValueRepository = new ProductAttributeValueRepository();
    
            // original price
            $productBgAttribute_price = $productAttributeValueRepository->findOneWhere([
                'product_id'   => $product->id,
                'attribute_id' => 31,
            ]);
            $source_price = 0;
            if(!is_null($productBgAttribute_price)) $source_price = $productBgAttribute_price->float_value;
            $source_price = core()->convertPrice($source_price);
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
                $price = self::getCartProductPrice($product,$product->id, $i);
                $package_product['old_price'] = round($source_price * $i, 2); 
                $package_product['old_price_format'] = core()->currencySymbol($currency).round($package_product['old_price'], 2); 
                //$package_product['new_price'] = "3.23" * $i;
                if ($i==2) $discount = 0.8;
                if ($i==3) $discount = 0.7;
                if ($i==4) $discount = 0.6;
                if ($i==1) $discount = 1;
                $package_product['new_price'] = self::getCartProductPrice($product,$product->id, $i) * $discount;
                $package_product['new_price_format'] = core()->currencySymbol($currency).round($package_product['new_price'], 2);
                $tip1_price = (1 - round(($package_product['new_price'] / $package_product['old_price']), 2)) * 100;
                $package_product['tip1'] = $tip1_price."% ";
                $tip2_price = round($package_product['new_price'] / $i, 2);
                $package_product['tip2'] = core()->currencySymbol($currency).$tip2_price;
                $package_product['shipping_fee'] = $shipping_price; // shipping price
                $popup_info['name'] = null;
                $popup_info['old_price'] = null;
                $popup_info['new_price'] = null;
                $popup_info['img'] = null;
                $package_product['popup_info'] = $popup_info;
                $package_products[] = $package_product;
            }

            Cache::put($cache_key, json_encode($package_products));
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
    private static function getCartProductPrice($product, $product_id, $qty) {
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

        
        $cart = Cart::addProduct($product['product_id'], $AddcartProduct);

        //获取购车中商品价格返回
        $cart = Cart::getCart();

        //var_dump($cart); exit;

        //清空购车动作
        Cart::deActivateCart();

        return $cart->grand_total;

    }

}