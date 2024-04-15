<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Nicelizhi\Shopify\Models\ShopifyProduct;
use Nicelizhi\Manage\Helpers\SSP;
use Webkul\Attribute\Models\AttributeOptionTranslation;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Illuminate\Support\Facades\Artisan;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Webkul\Product\Models\ProductAttributeValue;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{


    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
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

        if($version==null) $version = "v3";

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

            //var_dump($version);exit;

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

        if($version==null) $version = "v3";

        Cache::put("onebuy_".$product_id, $version);

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
    public function comments($product_id, $act_type, Request $request) {
        $act_prod_type = Cache::get($act_type."_".$product_id);
        $product = $this->productRepository->findBySlug($product_id);
        $redis = Redis::connection('default');

        $comment_list_key = "checkout_v1_product_comments_".$product['id'];
        if ($request->isMethod('POST'))
        {



            $request->validate([
                'comments_list_file' => 'required|max:2048',
            ]);
    
            $file = $request->file('comments_list_file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('imports/'.$product->id, "local");

            $force = $request->input("force");

            if($force=="1") {
                $redis->del($comment_list_key);
            }

            $prod_id = $product->id;

            $prod_comment_file = storage_path("app/").$filePath;
            Excel::import(new \Nicelizhi\OneBuy\Imports\ProdCommentsImport($prod_id), $prod_comment_file);

        }

        $comments = $redis->hgetall($comment_list_key);

        return view("shopify::products.".$act_type.".comments",compact("comments","product","product_id", "act_type", "act_prod_type"));

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
    public function images($product_id, $act_type, Request $request) {
        $act_prod_type = Cache::get($act_type."_".$product_id);

        $product = $this->productRepository->findBySlug($product_id);


        if ($request->isMethod('POST'))
        {

            $version = $request->input("version");
           

            $request->validate([
                'pc_banner' => 'mimes:jpg,png,webp|max:2048',
                 'mobile_bg' => 'mimes:jpg,png,webp|max:2048',
                 'product_size' => 'mimes:jpg,png,webp|max:2048',
            ]);

            $file = $request->file('pc_banner');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('product/'.$product->id, "public");
            
            if($filePath) {
                $productBgAttribute = ProductAttributeValue::where("product_id", $product->id)->where("attribute_id", 29)->first();
                if(is_null($productBgAttribute)) $productBgAttribute = new ProductAttributeValue();
                $productBgAttribute->product_id = $product->id;
                $productBgAttribute->attribute_id = 29;
                $productBgAttribute->text_value = $filePath;
                $productBgAttribute->save();

            }

            $file = $request->file('mobile_bg');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('product/'.$product->id, "public");
            
            if($filePath) {
                $productBgAttribute = ProductAttributeValue::where("product_id", $product->id)->where("attribute_id", 30)->first();
                if(is_null($productBgAttribute)) $productBgAttribute = new ProductAttributeValue();
                $productBgAttribute->product_id = $product->id;
                $productBgAttribute->attribute_id = 30;
                $productBgAttribute->text_value = $filePath;
                $productBgAttribute->save();

            }

            if($version == "v1") {
                $file = $request->file('product_size');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('product/'.$product->id, "public");
                
                if($filePath) {
                    $productBgAttribute = ProductAttributeValue::where("product_id", $product->id)->where("attribute_id", 32)->first();
                    if(is_null($productBgAttribute)) $productBgAttribute = new ProductAttributeValue();
                    $productBgAttribute->product_id = $product->id;
                    $productBgAttribute->attribute_id = 32;
                    $productBgAttribute->text_value = $filePath;
                    $productBgAttribute->save();
                }
            }

            


        }
        

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

        // products display image
        $product_image_lists = Cache::get("product_image_lists_".$product->id);

        //var_dump($product_image_lists);

        //onebuy
        //pc banner
        //mobile banner
        //size image

        if($act_prod_type=='v1') return view("shopify::products.".$act_type.".images.v1", compact("product", "productBgAttribute", "productBgAttribute_mobile", "productSizeImage", "act_prod_type","product_id", "act_type","product_image_lists"));
        if($act_prod_type=='v2') return view("shopify::products.".$act_type.".images.v2", compact("product", "productBgAttribute", "productBgAttribute_mobile", "productSizeImage", "act_prod_type","product_id", "act_type", "product_image_lists"));
        if($act_prod_type=='v3') return view("shopify::products.".$act_type.".images.v3", compact("product", "productBgAttribute", "productBgAttribute_mobile", "productSizeImage", "act_prod_type","product_id", "act_type", "product_image_lists"));
        
    }
}