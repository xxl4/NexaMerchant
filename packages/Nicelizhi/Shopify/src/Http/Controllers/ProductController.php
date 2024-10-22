<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Nicelizhi\Shopify\Models\ShopifyProduct;
use Nicelizhi\Manage\Helpers\SSP;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Illuminate\Support\Facades\Artisan;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Webkul\Product\Models\ProductAttributeValue;
use Webkul\Product\Models\ProductFlat;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Webkul\Product\Repositories\ProductReviewRepository;
use Illuminate\Support\Facades\Event;


class ProductController extends Controller
{

    private $lang = null;

    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected ShopifyStore $ShopifyStore,
        protected ProductReviewRepository $productReviewRepository,
        protected ShopifyProduct $ShopifyProduct

    ){
        $this->lang = config('shopify.store_lang');
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

        // check the product have syncing log
        $syncing = Cache::get("sync_".$product_id);
        if(!empty($syncing)) {
            echo "product is syncing, please wait a moment\r\n";
            return false;
        };

        Cache::put("sync_".$product_id, 1, 600);

        $options = $item->options;
        $LocalOptions = \Nicelizhi\Shopify\Helpers\Utils::createOptions($options);


        $version = $LocalOptions['version'];

        Cache::put("onebuy_".$product_id, $version);
        

        // two attr
        if($version=='v1') {
            echo config("app.url")."/onebuy/".$product_id."\r\n";
            Artisan::queue("shopify:product:getv4", ["--prod_id"=> $product_id])->onConnection('redis')->onQueue('shopify-products');
            return true;
        }

        // one attr
        if($version=='v2') {
            echo config("app.url")."/onebuy/v2/".$product_id."\r\n";
            Artisan::queue("shopify:product:getv2", ["--prod_id"=> $product_id])->onConnection('redis')->onQueue('shopify-products');
            return true;
        }

        // zero attr
        if($version=='v3') {
            //Artisan::call("shopify:product:getv3", ["--prod_id"=> $product_id]);
            echo config("app.url")."/onebuy/v3/".$product_id."\r\n";
            Artisan::queue("shopify:product:getv3", ["--prod_id"=> $product_id])->onConnection('redis')->onQueue('shopify-products');
            return true;
            //Artisan::call("shopify:product:getv3", ["--prod_id"=> $product_id]);
        }
    }

    public function checkoutUrlGet($product_id) {

        $product = $this->productRepository->findBySlug($product_id);
        
        $version = Cache::get("onebuy_".$product_id);
        if(empty($version)) {
            $item = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->first();

            if(is_null($item)) {
                return false;
            }
            $options = $item->options;
            $LocalOptions = \Nicelizhi\Shopify\Helpers\Utils::createOptions($options);
            $version = $LocalOptions['version'];
            Cache::put("onebuy_".$product_id, $version);
        }

        \Nicelizhi\Shopify\Helpers\Utils::clearCache($product->id, $product_id); // clear cache
        
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
        if(is_null($product)) {
            echo "not found it";
            return ;
        }
        $redis = Redis::connection('default');

        $comment_list_key = "checkout_v1_product_comments_".$product['id'];
        $comment_list_key2 = "onebuy_v2_product_comments_".$product['id'];
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
                $redis->del($comment_list_key2);

                \Webkul\Product\Models\ProductReview::where("product_id", $product->id)->delete();

              

            }

            $prod_id = $product->id;

            $prod_comment_file = storage_path("app/").$filePath;
            Excel::import(new \Nicelizhi\OneBuy\Imports\ProdCommentsImport($prod_id, $force), $prod_comment_file);

        }

        $comments = $redis->hgetall($comment_list_key);

        //$reviews = $product->reviews->where('status', 'approved');
        //$reviews = $product->reviews;

        $reviews = \Webkul\Product\Models\ProductReview::where("product_id", $product->id)->orderBy("sort","desc")->limit(1000)->get();

        $reviews = $reviews->map(function($review) {
            $review->customer = $review->customer;
            $review->images;
            return $review;
        });

        //var_dump($reviews);

        

        return view("shopify::products.".$act_type.".comments",compact("comments","reviews","product","product_id", "act_type", "act_prod_type"));

    }

    /**
     * 
     * Product Reviews Sort
     * 
     * @return void
     */
    public function commentSort(Request $request) {
        $comment_id = $request->input("comment_id");
        $sort = $request->input("sort");

        Event::dispatch('customer.review.update.before', $comment_id);

        $review = $this->productReviewRepository->update(['sort'=> $sort], $comment_id);

        Event::dispatch('customer.review.update.after', $review);

        //clean the cache

        return response()->json([
            'message' => "Update Success,if you want to see the last version, you should clean the comment cache",
            'comment_id' => $comment_id
        ]);



    }

    /**
     * 
     * Comments Update Status
     * 
     * @return void
     * 
     */
    public function commentsUpdateStatus() {
        $comment_ids = request()->input("comment_ids");
        $status = request()->input("status");

        $comments = $this->productReviewRepository->findWhereIn("id",$comment_ids);
        foreach($comments as $comment) {
            Event::dispatch('customer.review.update.before', $comment->id);
            $comment->update(['status'=> $status]);
            Event::dispatch('customer.review.update.after', $comment);
        }


        return response()->json([
            'message' => "success",
            'comment_id' => $comment_ids
        ]);
    }

    /**
     * 
     * Comments Delete
     * @return void
     * 
     */
    public function commentDelete(Request $request) {
        
        $comment_id = $request->input("comment_id");

        $comment = $this->productReviewRepository->find($comment_id);
        if(is_null($comment)) {
            return response()->json([
                'message' => "error"
            ]);
        }

        $product_id = $comment->product_id;
        $comment->delete();

        // echo"<script>alert('Delete Success!');window.close();</script>";  
        // return false;

        return response()->json([
            'message' => "success",
            'product_id' => $product_id
        ]);

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
        //$act_prod_type = Cache::get($act_type."_".$product_id);

        $version = Cache::get($act_type."_".$product_id);
        if(empty($version)) {
            $item = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->first();

            if(is_null($item)) {
                return false;
            }
            $options = $item->options;
            $LocalOptions = \Nicelizhi\Shopify\Helpers\Utils::createOptions($options);
            $version = $LocalOptions['version'];
            Cache::put("onebuy_".$product_id, $version);
        }

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
            if(!empty($file)) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('product/'.$product->id, "public");
                
                if(!empty($filePath)) {
                    $productBgAttribute = ProductAttributeValue::where("product_id", $product->id)->where("attribute_id", 29)->first();
                    if(is_null($productBgAttribute)) $productBgAttribute = new ProductAttributeValue();
                    $productBgAttribute->product_id = $product->id;
                    $productBgAttribute->attribute_id = 29;
                    $productBgAttribute->text_value = $filePath;
                    $productBgAttribute->save();
    
                }
            }


            $file2 = $request->file('mobile_bg');
            if(!empty($file2)) {
                $fileName = $file2->getClientOriginalName();
                $filePath = $file2->store('product/'.$product->id, "public");
                
                if(!empty($filePath)) {
                    $productBgAttribute = ProductAttributeValue::where("product_id", $product->id)->where("attribute_id", 30)->first();
                    if(is_null($productBgAttribute)) $productBgAttribute = new ProductAttributeValue();
                    $productBgAttribute->product_id = $product->id;
                    $productBgAttribute->attribute_id = 30;
                    $productBgAttribute->text_value = $filePath;
                    $productBgAttribute->save();
    
                }
            }


            if($version == "v1" || $version=='v2') {
                $file3 = $request->file('product_size');
                if(!empty($file3)) {
                    $fileName = $file3->getClientOriginalName();
                    $filePath = $file3->store('product/'.$product->id, "public");
                    
                    if(!empty($filePath)) {
                        $productBgAttribute = ProductAttributeValue::where("product_id", $product->id)->where("attribute_id", 32)->first();
                        if(is_null($productBgAttribute)) $productBgAttribute = new ProductAttributeValue();
                        $productBgAttribute->product_id = $product->id;
                        $productBgAttribute->attribute_id = 32;
                        $productBgAttribute->text_value = $filePath;
                        $productBgAttribute->save();
                    }
                }

            }

            if($version=='v3') {
                $product_image_list = [];
                $product_1 = $request->file("product_1");
                if(!empty($product_1)) {
                    $fileName = $product_1->getClientOriginalName();
                    $filePath = $product_1->store('product/'.$product->id, "public");
                    if($filePath) {
                        array_push($product_image_list, ['key'=> 1, 'value'=> $filePath]);
                    }
                }
                $product_2 = $request->file("product_2");
                if(!empty($product_2)) {
                    $fileName = $product_2->getClientOriginalName();
                    $filePath = $product_2->store('product/'.$product->id, "public");
                    if($filePath) {
                        array_push($product_image_list, ['key'=> 2, 'value'=> $filePath]);
                    }
                }
                $product_3 = $request->file("product_3");
                if(!empty($product_3)) {
                    $fileName = $product_3->getClientOriginalName();
                    $filePath = $product_3->store('product/'.$product->id, "public");
                    if($filePath) {
                        array_push($product_image_list, ['key'=> 3, 'value'=> $filePath]);
                    }
                }
                $product_4 = $request->file("product_4");
                if(!empty($product_4)) {
                    $fileName = $product_4->getClientOriginalName();
                    $filePath = $product_4->store('product/'.$product->id, "public");
                    if($filePath) {
                        array_push($product_image_list, ['key'=> 4, 'value'=> $filePath]);
                    }
                }

                //insert the cache
                Cache::put("product_image_lists_".$product->id, $product_image_list);

            }

            \Nicelizhi\Shopify\Helpers\Utils::clearCache($product->id, $product_id);
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

        if($version=='v1') return view("shopify::products.".$act_type.".images.v1", compact("product", "productBgAttribute", "productBgAttribute_mobile", "productSizeImage", "version","product_id", "act_type","product_image_lists"));
        if($version=='v2') return view("shopify::products.".$act_type.".images.v2", compact("product", "productBgAttribute", "productBgAttribute_mobile", "productSizeImage", "version","product_id", "act_type", "product_image_lists"));
        if($version=='v3') return view("shopify::products.".$act_type.".images.v3", compact("product", "productBgAttribute", "productBgAttribute_mobile", "productSizeImage", "version","product_id", "act_type", "product_image_lists"));
        
    }

    public function info($product_id, $act_type, Request $request) {
        $version = Cache::get($act_type."_".$product_id);
        if(empty($version)) {
            $item = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $product_id)->first();

            if(is_null($item)) {
                return false;
            }
            $options = $item->options;
            $LocalOptions = \Nicelizhi\Shopify\Helpers\Utils::createOptions($options);
            $version = $LocalOptions['version'];
            Cache::put("onebuy_".$product_id, $version);
        }

        $locale_get = $request->input('locale');

        $product = $this->productRepository->findBySlug($product_id);
        if ($request->isMethod('POST'))
        {
            //$product = $this->productRepository->update($request->all(), $product_id);
            $name = $request->input('name'); // product name
            

            $currentLocale = core()->getRequestedLocale();

            $productAttribute = ProductAttributeValue::where("product_id", $product->id)->where("attribute_id", 2)->where("locale", $locale_get)->first();
            if(is_null($productAttribute)) $productAttribute = new ProductAttributeValue();
            $productAttribute->product_id = $product->id;
            $productAttribute->attribute_id = 2;
            $productAttribute->text_value = $name;
            $productAttribute->locale = $locale_get;
            $productAttribute->save();

            $productFlat = ProductFlat::where('product_id', $product->id)->where('locale', $locale_get)->first();
            if(is_null($productFlat)) $productFlat = new ProductFlat();
            $productFlat->name = $name;
            $productFlat->locale = $locale_get;
            $productFlat->save();


            
            //var_dump($locale_get, $name, $currentLocale->code);exit;

            //save to attribute

            // $product = $this->productRepository->update([
            //     'name' => $name,
            //     'locale' => $locale_get,
            //     'channel' => 'default',
            // ], $product->id);




            // save to product flat

           


            \Nicelizhi\Shopify\Helpers\Utils::clearCache($product->id, $product_id);

        }

        //var_dump($product->name);
        

        return view("shopify::products.info", compact("product", "product_id", "act_type","locale_get"));
    }

    public function commentsManual($product_id, Request $request) {

        $force = $request->input("force");
        $product = $this->productRepository->findBySlug($product_id);
        if(is_null($product)) {
            return response()->json([
                'message' => "error"
            ]);
        }

        if($force==1) {
            $redis = Redis::connection('default');
            

            $comment_list_key = "checkout_v1_product_comments_".$product['id'];
            //$comment_list_key = "checkout_v1_product_comments_".$product_id;
            $redis->del($comment_list_key);

              //delete the db
              $items = $product->reviews;
              //var_dump($items);
              foreach($items as $key=>$item) {
                   Event::dispatch('customer.review.delete.before', $item->id);
                   $this->productReviewRepository->delete($item->id);
                   Event::dispatch('customer.review.delete.after', $item->id);
              }
              //exit;

        }
        //Artisan::call("onebuy:import:products:comment:from:judge",  ["--prod_id"=> $product_id]);
        
        Artisan::queue("onebuy:import:products:comment:from:judge",  ["--prod_id"=> $product_id])->onConnection('redis')->onQueue('shopify-comments'); // import the shopify comments

        return response()->json([
            'product_id' => $product->id,
            'message' => "success"
        ]);
    }

    // sell points
    public function sellPoints($product_id, Request $request) {
        $product = $this->productRepository->findBySlug($product_id);
        if(is_null($product)) {
            return "please import products first";
        }
        $act_type = "checkoutv2";

        $redis = Redis::connection('default');

        $sell_points_key = "sell_points_".$product_id;

        $sell_points = $redis->hgetall($sell_points_key);
        if(count($sell_points)==0) {
            for($i=1;$i<=5;$i++) {
                $redis->hset($sell_points_key, $i, "");
            }
        }
        $sell_points = $redis->hgetall($sell_points_key);
        ksort($sell_points);
        if ($request->isMethod('POST'))
        {
            $sell_points = $request->input('sell_points');
            foreach($sell_points as $key=>$value) {
                $redis->hset($sell_points_key, $key, $value);
            }
            
            \Nicelizhi\Shopify\Helpers\Utils::clearCache($product->id, $product_id);

        }

        return view("shopify::products.".$act_type.".sell-points-v2", compact("product", "product_id", "act_type","sell_points"));
    }


    // clean cache
    public function cleanCache($product_id) {

        $product = $this->productRepository->findBySlug($product_id);
        if(is_null($product)) {
            echo "not found it, you don't clean it cache";
            return ;
        }
        \Nicelizhi\Shopify\Helpers\Utils::clearCache($product->id, $product_id);

        echo "Clean Cache Success";
    }

    // customer code
    public function checkoutCustomerCode($product_id, Request $request) {
        $product = $this->productRepository->findBySlug($product_id);
        if(is_null($product)) {
            return "please import products first";
        }

        $redis = Redis::connection('default');
        
        $checkoutItems = \Nicelizhi\Shopify\Helpers\Utils::getAllCheckoutVersion();
        if ($request->isMethod('POST'))
        {
            $checkoutItems = $request->input('checkoutItems');

            //var_dump($checkoutItems);

            foreach($checkoutItems as $key=>$value) {
                $new_key = str_replace("checkoutItems[","",$key);
                //var_dump($value, $key, $new_key);exit;

                $cachek_key = "checkout_".$new_key."_".$product_id;
                
                $redis->set($cachek_key, json_encode($value));

            }

            //exit;
            
            \Nicelizhi\Shopify\Helpers\Utils::clearCache($product->id, $product_id);

            return response()->json([
                'product_id' => $product_id,
                'message' => "success"
            ]);

        }

        $codeKeys = [
            'title' => '',
            'title_activity' => '',
        ];


        foreach($checkoutItems as $key=>$item) {
            $cachek_key = "checkout_".$item."_".$product_id;
            //echo $cachek_key;
            $cacheData = $redis->get($cachek_key);
            if(empty($cacheData)) {
                $cacheData = json_encode($codeKeys);
            }
            $checkoutItems[$key] = $cacheData;
        }    

        //var_dump($checkoutItems);

        return view("shopify::products.customer-code",compact("product","product_id","checkoutItems","codeKeys"));
    }
}
