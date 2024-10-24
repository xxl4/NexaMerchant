<?php
namespace Nicelizhi\OneBuy\Helpers;
use GuzzleHttp\Client;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Attribute\Models\AttributeOptionTranslation;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Models\ProductAttributeValue;
use Illuminate\Support\Facades\Cache;
use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\Log;

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
        //if(true) {
            $package_products = [];
            $productBaseImage = product_image()->getProductBaseImage($product);
    
            //source price
            $productAttributeValueRepository = new ProductAttributeValue();
    
            // original price
            $productBgAttribute_price = $productAttributeValueRepository->where([
                'product_id'   => $product->id,
                'attribute_id' => 31,
            ])->first();
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
                $package_product['new_price'] = $price * $discount;
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

        $productType = $product->type;

        $AddcartProduct = [];
        
        $AddcartProduct['quantity'] = $qty;

        $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();

        $attributes = $productViewHelper->getConfigurationConfig($product);

        if($product_id)

        if($productType=="simple") {

        }

        if($product_id==3692) {
            //Log::info($product_id."--". json_encode($attributes));
            //exit;
        }

        if($productType=='configurable') {
            $product_variant_id = 0;
            $super_attribute = [];
            //var_dump($attributes);exit;
            foreach($attributes['attributes'] as $key=>$attribute) {
                Log::info($product_id."--". json_encode($attribute));
                if(!isset($attribute['options'][0]['id'])) continue;
                $super_attribute[$attribute['id']] = isset($attribute['options'][0]['id']) ? $attribute['options'][0]['id'] : 0 ;
                $product_variant_id = isset($attribute['options'][0]['products'][0]) ? $attribute['options'][0]['products'][0] : 0 ;
            }
    
            $AddcartProduct['selected_configurable_option'] = $product_variant_id;
            $AddcartProduct['super_attribute'] = $super_attribute;
        }
        //var_dump($attributes);exit;
        //var_dump($product['product_id']);exit;
        if($product_id==3692) {
            //Log::info($product_id."--". json_encode($AddcartProduct));
            //exit;
        }
        $cart = Cart::addProduct($product['product_id'], $AddcartProduct);
        $cart = Cart::getCart();
        //清空购车动作
        Cart::deActivateCart();

        return $cart->grand_total;

    }

    public static function getCurrencyByCountry($country) {

        $channel = core()->getCurrentChannel();

        Log::info("channel: ".json_encode($channel));

        $country = strtoupper($country);

        // currency from currenices table
        $currencies = core()->getAllCurrencies();

        Log::info("currencies: ".json_encode($currencies));

        $currencies = core()->getChannelBaseCurrency();

        Log::info("channel currencies: ".json_encode($currencies));

        return "USD";
    }

}