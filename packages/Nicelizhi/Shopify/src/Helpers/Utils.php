<?php
namespace Nicelizhi\Shopify\Helpers;

use COM;
use GuzzleHttp\Client;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Attribute\Models\AttributeOptionTranslation;
use Illuminate\Support\Facades\Cache;

final class Utils {

    
    const CHECKOUT_V1 = "v1";
    const CHECKOUT_V2 = "v2";
    const CHECKOUT_V3 = "v3";
    const CHECKOUT_V4 = "v4";
    const CHECKOUT_V5 = "v5";

    // get all checkout version
    public static function getAllCheckoutVersion() {
        return [
            self::CHECKOUT_V5 => self::CHECKOUT_V5,
            self::CHECKOUT_V4 => self::CHECKOUT_V4,
            self::CHECKOUT_V3 => self::CHECKOUT_V3,
            self::CHECKOUT_V2 => self::CHECKOUT_V2,
            self::CHECKOUT_V1 => self::CHECKOUT_V1
        ];
    }


    // send msg to wcom
    public static function send($text,$msgtype="text") {
        $url = config("shopify.wcom_noticle_url");
        //var_dump($url);
        if(empty($url)) return false;

        //echo $url."\r\n";

        $argc = [];
        $argc['msgtype'] = $msgtype;
        $argc['text'] = [
            'content' => $text
        ];

         $header = [];
         $header[] = "Content-Type:application/json";

         //var_dump($argc);

        $client = new Client();
        $response = $client->post($url,[
            \GuzzleHttp\RequestOptions::JSON => $argc
        ]);
        //var_dump($response, $argc);     
    }

    // base on shopify data create options data
    public static function createOptions($options) {
        $data = [];
        $LocalOptions = [];
        $color = [];
        $size = [];
        $color_mapp = [];
        $size_mapp = [];

        $version = null;

        foreach($options as $kk => $option) {
            $option['name'] = strtolower($option['name']);
            echo "attr---".$option['name']."\r\n";
            $attr_id = 0;
            if(strpos($option['name'], "Size")!==false) $attr_id = 24;
            if(strpos($option['name'], "size")!==false) $attr_id = 24;
            if(strpos($option['name'], "GRÖSSE")!==false) $attr_id = 24;
            if(strpos($option['name'], "grÖsse")!==false) $attr_id = 24;
            if(strpos($option['name'], "grösse")!==false) $attr_id = 24;
            if(strpos($option['name'], "尺码") !==false) $attr_id = 24;
            if(strpos($option['name'], "Length") !==false) $attr_id = 24;
            if(strpos($option['name'], "größe") !==false) $attr_id = 24;
            if(strpos($option['name'], "taille") !==false) $attr_id = 24;
            if(strpos($option['name'], "tamaño") !==false) $attr_id = 24;

            if(strpos($option['name'], "Color") !==false) $attr_id = 23;
            if(strpos($option['name'], "color") !==false) $attr_id = 23;
            if(strpos($option['name'], "couleur") !==false) $attr_id = 23;
            if(strpos($option['name'], "颜色") !==false) $attr_id = 23;
            if(strpos($option['name'], "FARBE") !==false) $attr_id = 23;
            if(strpos($option['name'], "farbe") !==false) $attr_id = 23;
            if(strpos($option['name'], "stil") !==false) $attr_id = 23;

            if(empty($attr_id)) {
                //var_dump($option['name']);
                $error = 1;
                continue;
                //exit;
            }
            //$this->info("attr id ". $attr_id);

            $values = $option['values'];
            foreach($values as $kky => $value) {
                //var_dump($value);
                if($value==35 && $attr_id==23) {
                    //var_dump($item);exit;
                }
                //ba_attribute_options
                $attr_option = AttributeOption::where("attribute_id", $attr_id)->where("admin_name", $value)->first();
                if(is_null($attr_option)) {
                    $attr_option = new AttributeOption();
                    $attr_option->attribute_id = $attr_id;
                    $attr_option->admin_name = $value;
                    $attr_option->save();
                    $attribute_option_id = $attr_option->id;
                }else{
                    $attribute_option_id = $attr_option->id;
                }

                if($attr_id==24) $size_mapp[$value] = $attribute_option_id;
                if($attr_id==23) $color_mapp[$value] = $attribute_option_id;

                $lang = config('shopify.store_lang');

                $locales = core()->getAllLocales()->pluck('code')->toArray();

                //var_dump($attr_opt_tran);exit;
                foreach($locales as $kl => $locale) {
                    $attr_opt_tran = AttributeOptionTranslation::where("attribute_option_id", $attribute_option_id)->where("locale", $locale)->first();
                    if(is_null($attr_opt_tran)) {
                        $attr_opt_tran = new AttributeOptionTranslation();
                        if($locale==$lang) {
                            $attr_opt_tran->label = $value;
                        } else{
                            $attr_opt_tran->label = "";
                        }
                        $attr_opt_tran->locale = $locale;
                        $attr_opt_tran->attribute_option_id = $attribute_option_id;
                        $attr_opt_tran->save();
                    }
                }
                if($attr_id==23) $color[$attribute_option_id] = $attribute_option_id; //array_push($color, $attribute_option_id); 
                if($attr_id==24) $size[$attribute_option_id] = $attribute_option_id;

                $LocalOptions[$attr_id][] = $attribute_option_id;
            }

            if(!empty($color) && !empty($size)) {
                $version = "v1";
            }

            // one attr
            if(!empty($color) || !empty($size)) {
                if(empty($version)) $version = "v2";
            }

            // zero attr
            if(empty($color) && empty($size)) {
                if(empty($version)) $version = "v3";
            }
            
        }

        if($version==null) $version = "v3";


        //var_dump($LocalOptions);

        $data['color'] = $color;
        $data['color_mapp'] = $color_mapp;
        $data['size'] = $size;
        $data['size_mapp'] = $size_mapp;
        $data['version'] = $version;
        $data['LocalOptions'] = $LocalOptions;

        //var_dump($LocalOptions);exit;

        return $data;
    }

    // clear cache
    public static function clearCache($pid, $shopify_id=0){
        if($pid!=0) {
            Cache::pull("product_color_size_".$pid);
            Cache::pull("product_attributes_".$pid);
            Cache::pull("product_sku_size_".$pid);
            Cache::pull("product_sku_".$pid);
            Cache::pull("product_comment_".$pid); // product comment
            Cache::pull("product_comment_".$pid."_0_10");
            Cache::pull("product_comment_".$pid."_1_10");
            Cache::pull("product_comment_".$pid."_2_10");
            Cache::pull("product_comment_".$pid."_3_10");
            Cache::pull("product_comment_".$pid."_4_10");
            Cache::pull("product_comment_".$pid."_5_10");
            Cache::pull("product_comment_".$pid."_6_10");
            Cache::pull("product_ext_".$pid."_4_EUR");
            Cache::pull("product_ext_".$pid."_4_USD");
            Cache::pull("product_ext_".$pid."_4_AUD");
            Cache::pull("product_ext_".$pid."_4_GBP");
        }
        if($shopify_id!=0) {
            Cache::pull("product_url_".$shopify_id);
            Cache::pull("checkout_v2_cache_".$shopify_id);
            Cache::pull("checkout_v1_cache_".$shopify_id);
            Cache::pull("checkout_v2_".$shopify_id);
            Cache::pull("shopify_images_".$shopify_id);
            Cache::pull("shopify_full_".$shopify_id);

            Cache::pull("product_url_".$shopify_id."_USD");
            Cache::pull("product_url_".$shopify_id."_AUD");
            Cache::pull("product_url_".$shopify_id."_EUR");
            Cache::pull("checkout_v2_".$shopify_id."_USD");
            Cache::pull("checkout_v2_".$shopify_id."_AUD");
            Cache::pull("checkout_v2_".$shopify_id."_EUR");
        }
    }

}