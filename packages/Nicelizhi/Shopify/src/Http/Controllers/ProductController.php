<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Nicelizhi\Shopify\Models\ShopifyProduct;
use Nicelizhi\Manage\Helpers\SSP;
use Webkul\Attribute\Models\AttributeOptionTranslation;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Product\Repositories\ProductRepository;
use Illuminate\Support\Facades\Artisan;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{


    public function __construct(
        //protected ProductRepository $productRepository,
        protected ShopifyStore $ShopifyStore,
        protected ShopifyProduct $ShopifyProduct

    ){

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shopify_store_id = config('shopify.shopify_store_id');
        $shopifyStore = Cache::get("shopify_store_".$shopify_store_id);

        if(empty($shopifyStore)){
            $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $shopify_store_id)->first();
            Cache::put("shopify_store_".$shopify_store_id, $shopifyStore, 3600);
        }

        if (request()->ajax()) {
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'shopify_products';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`p`.`product_id`',  'dt' => 'product_id', 'field'=>'product_id','formatter' => function($d, $row){
                    return $d;
                } ),
                array( 'db' => '`p`.`title`',   'dt' => 'title', 'field'=>'title' ),
                array( 'db' => '`p`.`handle`',   'dt' => 'handle', 'field'=>'handle', 'formatter' => function($d, $row){
                    return "/products/".$d;
                }),
                array( 'db' => '`p`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`p`.`updated_at`',   'dt' => 'updated_at', 'field'=>'updated_at' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `p` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }
        
        return view('shopify::products.index', compact('shopifyStore'));
    }

    public function sync($product_id) {
        $item = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->first();

        if(is_null($item)) {
            return false;
        }

        $options = $item->options;
        //var_dump($options);
        $color = [];
        $size = [];
        foreach($options as $kk => $option) {
            $option['name'] = strtolower($option['name']);
            echo $option['name']."\r\n";
            $attr_id = 0;
            if(strpos($option['name'], "Size")!==false) $attr_id = 24;
            if(strpos($option['name'], "size")!==false) $attr_id = 24;
            if(strpos($option['name'], "GRÖSSE")!==false) $attr_id = 24;
            if(strpos($option['name'], "grÖsse")!==false) $attr_id = 24;
            if(strpos($option['name'], "尺码") !==false) $attr_id = 24;
            if(strpos($option['name'], "Length") !==false) $attr_id = 24;
            if(strpos($option['name'], "größe") !==false) $attr_id = 24;
            if(strpos($option['name'], "größe") !==false) $attr_id = 24;
            if(strpos($option['name'], "Color") !==false) $attr_id = 23;
            if(strpos($option['name'], "color") !==false) $attr_id = 23;
            if(strpos($option['name'], "Couleur") !==false) $attr_id = 23;
            if(strpos($option['name'], "颜色") !==false) $attr_id = 23;
            if(strpos($option['name'], "FARBE") !==false) $attr_id = 23;
            if(strpos($option['name'], "farbe") !==false) $attr_id = 23;

            echo $attr_id."\r\n";

            if(empty($attr_id)) {
                $error = 1;
                continue;
                //exit;
            }

            $values = $option['values'];
            $version = null;
            foreach($values as $kky => $value) {
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

                $locales = core()->getAllLocales()->pluck('code')->toArray();

                //var_dump($attr_opt_tran);exit;
                foreach($locales as $kl => $locale) {
                    $attr_opt_tran = AttributeOptionTranslation::where("attribute_option_id", $attribute_option_id)->where("locale", $locale)->first();
                    if(is_null($attr_opt_tran)) {
                        $attr_opt_tran = new AttributeOptionTranslation();
                        if($locale==$this->lang) {
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
            }

            // two attr
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

        // two attr
        if($version=='v1') {
            echo config("app.url")."/onebuy/".$product_id."\r\n";
            Artisan::queue("shopify:product:get", ["--prod_id"=> $product_id])->onConnection('redis')->onQueue('shopify-products');
        }

        // one attr
        if($version=='v2') {
            echo config("app.url")."/onebuy/v2/".$product_id."\r\n";
            Artisan::queue("shopify:product:getv2", ["--prod_id"=> $product_id])->onConnection('redis')->onQueue('shopify-products');
        }

        // zero attr
        if($version=='v3') {
            //Artisan::call("shopify:product:getv3", ["--prod_id"=> $product_id]);
            echo config("app.url")."/onebuy/v3/".$product_id."\r\n";
            Artisan::queue("shopify:product:getv3", ["--prod_id"=> $product_id])->onConnection('redis')->onQueue('shopify-products');
            //Artisan::call("shopify:product:getv3", ["--prod_id"=> $product_id]);
        }
    }

    public function checkoutUrlGet($product_id) {
        $item = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->first();

        if(is_null($item)) {
            return false;
        }

        $options = $item->options;
        //var_dump($options);
        $color = [];
        $size = [];
        foreach($options as $kk => $option) {
            $option['name'] = strtolower($option['name']);
            echo $option['name']."\r\n";
            $attr_id = 0;
            if(strpos($option['name'], "Size")!==false) $attr_id = 24;
            if(strpos($option['name'], "size")!==false) $attr_id = 24;
            if(strpos($option['name'], "GRÖSSE")!==false) $attr_id = 24;
            if(strpos($option['name'], "grÖsse")!==false) $attr_id = 24;
            if(strpos($option['name'], "尺码") !==false) $attr_id = 24;
            if(strpos($option['name'], "Length") !==false) $attr_id = 24;
            if(strpos($option['name'], "größe") !==false) $attr_id = 24;
            if(strpos($option['name'], "größe") !==false) $attr_id = 24;
            if(strpos($option['name'], "Color") !==false) $attr_id = 23;
            if(strpos($option['name'], "color") !==false) $attr_id = 23;
            if(strpos($option['name'], "Couleur") !==false) $attr_id = 23;
            if(strpos($option['name'], "颜色") !==false) $attr_id = 23;
            if(strpos($option['name'], "FARBE") !==false) $attr_id = 23;
            if(strpos($option['name'], "farbe") !==false) $attr_id = 23;

            echo $attr_id."\r\n";

            if(empty($attr_id)) {
                $error = 1;
                continue;
                //exit;
            }

            $values = $option['values'];
            $version = null;
            foreach($values as $kky => $value) {
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

                $locales = core()->getAllLocales()->pluck('code')->toArray();

                //var_dump($attr_opt_tran);exit;
                foreach($locales as $kl => $locale) {
                    $attr_opt_tran = AttributeOptionTranslation::where("attribute_option_id", $attribute_option_id)->where("locale", $locale)->first();
                    if(is_null($attr_opt_tran)) {
                        $attr_opt_tran = new AttributeOptionTranslation();
                        if($locale==$this->lang) {
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
            }

            // two attr
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

        // two attr
        if($version=='v1') {
            //Artisan::call("shopify:product:get", ["--prod_id"=> $product_id]);
            //echo config("app.url")."/onebuy/".$product_id."\r\n";
            return redirect(config("app.url")."/onebuy/".$product_id."?time=".time());

        }

        // one attr
        if($version=='v2') {
            //Artisan::call("shopify:product:getv2", ["--prod_id"=> $product_id]);
            //echo config("app.url")."/onebuy/v2/".$product_id."\r\n";
            return redirect(config("app.url")."/onebuy/v2/".$product_id."?time=".time());

        }

        // zero attr
        if($version=='v3') {
            //Artisan::call("shopify:product:getv3", ["--prod_id"=> $product_id]);
            //echo config("app.url")."/onebuy/v3/".$product_id."\r\n";
            return redirect(config("app.url")."/onebuy/v3/".$product_id."?time=".time());

        }
    }

    /**
     * 
     * 
     * product comments
     * @param int $product_id
     * @return \Illuminate\View\View
     * 
     * 
     */
    public function comments($product_id) {

    }

    /**
     * 
     * 
     * product images
     * @param int $product_id
     * @return \Illuminate\View\View
     * 
     * 
     */
    public function images($product_id) {

    }
}