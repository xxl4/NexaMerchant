<?php

namespace Nicelizhi\Shopify\Console\Commands\Product;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Attribute\Models\AttributeOptionTranslation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Webkul\Product\Models\ProductImage;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Artisan;

class Get extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:product:get {--prod_id=} {--force=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Products List or a product shopify:product:get {--prod_id=} {--force=} color and size';

    private $shopify_store_id = "";

    private $category_id = 0;

    private $lang = null;

    private $locales = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected InventorySourceRepository $inventorySourceRepository,
        protected ProductRepository $productRepository,
        protected ShopifyStore $ShopifyStore,
    )
    {
        $this->shopify_store_id = config('shopify.shopify_store_id');
        $this->lang = config('shopify.store_lang');
        $this->category_id = 9;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $shopify_pro_id = $this->option('prod_id');
        if(empty($shopify_pro_id)) {
            $this->error("prod id is empty");
            return false;
        }
        echo $shopify_pro_id."\r\n";
        $force = $this->option('force');
        $this->info($this->lang);
        //exit;

        // locales
        $this->locales = core()->getAllLocales()->pluck('code')->toArray();

        $client = new Client();

        $shopifyStore = Cache::get("shopify_store_".$this->shopify_store_id);

        if(empty($shopifyStore)){
            $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $this->shopify_store_id)->first();
            Cache::put("shopify_store_".$this->shopify_store_id, $shopifyStore, 3600);
        }

        if(is_null($shopifyStore)) {
            $this->error("no store");
            return false;
        }

        $shopify = $shopifyStore->toArray();

        $shopifyProduct = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $shopify_pro_id)->first();
        if(!is_null($shopifyProduct) && $force) {
            if($force==true) {
                \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $shopify_pro_id)->delete();
            }else{
                $this->error($shopify_pro_id." have imported!");
                return false;
            }

        }
        if($shopifyProduct && !$force) {
            $this->syncProductToLocal($shopify_pro_id);

            // 处理目录权限
            $this->Permissions();
            return false;
        }
        /**
         * 
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/product#get-products?ids=632910392,921728736
         * 
         */
        $created_at_min = date("Y-m-d")."T00:00:00-00:00";
        $response = $client->get($shopify['shopify_app_host_name'].'/admin/api/2023-10/products.json?ids='.$shopify_pro_id.'&limit=10&fields=id,title,variants,options,images,product_type,body_html,tags,admin_graphql_api_id,collection_id', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
            ]
        ]);

        $body = json_decode($response->getBody(), true);

        $body = $response->getBody();
        //Log::info($body);
        $body = json_decode($body, true);
        //var_dump($body);exit;
        foreach($body['products'] as $key=>$item) {
            $shopifyProduct = \Nicelizhi\Shopify\Models\ShopifyProduct::where("product_id", $item['id'])->first();
            if(is_null($shopifyProduct)) {
                $shopifyProduct = new \Nicelizhi\Shopify\Models\ShopifyProduct();
                $item['product_id'] = $item['id'];
                unset($item['id']);
                $item['shopify_store_id'] = $this->shopify_store_id;
                $shopifyProduct::create($item);
            }else{
                //$shopifyProduct::where("product_id", $item['id'])->update($item);
            }
        }

        
        $this->syncProductToLocal($shopify_pro_id);

        // 处理目录权限
        $this->Permissions();

    }

    /**
     * 
     * 
     * Clear the cache for this product
     * 
     * @param int $pid
     * 
     * 
     */
    protected function clearCache($pid) {
        Cache::pull("product_color_size_".$pid);
        Cache::pull("product_attributes_".$pid);
        Cache::pull("product_sku_size_".$pid);
        Cache::pull("product_sku_".$pid);
        Cache::pull("product_sku_".$pid);
    }

    protected function Permissions() {
        $local_image_path = "storage/product/";
        $path = public_path($local_image_path);
        $execPath = "chown www:www ". $path."* -R";   
        $this->error($execPath);
        //exit;     
        exec($execPath);
    }   

    /**
     * 
     * sync product to local product
     * 
     */
    public function syncProductToLocal($shopify_pro_id) {
        $items = \Nicelizhi\Shopify\Models\ShopifyProduct::where("shopify_store_id", $this->shopify_store_id)->where("product_id", $shopify_pro_id)->get();
        foreach($items as $key=>$item) {
            // if($item['product_id']!='8126562107640') continue;
            $this->info($item['product_id']);

            //var_dump($item->options);exit;

            // 23 color
            // 24 size
            // ba_attribute_options
            // ba_attribute_option_translations

            $redis = Redis::connection('default');

            $images_map = [];

            $options = $item->options;
            $shopifyVariants = $item->variants;
            $shopifyImages = $item->images;
            
            foreach($shopifyImages as $key=>$shopifyImage) {
                //var_dump($shopifyImage);
                
                $images_map[$shopifyImage['id']] = $shopifyImage['src'];
                foreach($shopifyImage['variant_ids'] as $kk=>$variant_ids) {
                    //var_dump($variant_ids);
                    $images_map[$variant_ids] = $shopifyImage['src'];
                }
            }

            //var_dump($images_map);exit;

            //var_dump($shopifyVariants);exit;


            $color = [];
            $size = [];
            $error = 0;
            $LocalOptions = [];
            foreach($options as $kk => $option) {
                $option['name'] = strtolower($option['name']);
                $attr_id = 0;
                if(strpos($option['name'], "Size")!==false) $attr_id = 24;
                if(strpos($option['name'], "size")!==false) $attr_id = 24;
                if(strpos($option['name'], "GRÖSSE")!==false) $attr_id = 24;
                if(strpos($option['name'], "grÖsse")!==false) $attr_id = 24;
                if(strpos($option['name'], "grösse")!==false) $attr_id = 24;
                if(strpos($option['name'], "尺码") !==false) $attr_id = 24;
                if(strpos($option['name'], "Length") !==false) $attr_id = 24;
                if(strpos($option['name'], "größe") !==false) $attr_id = 24;
                if(strpos($option['name'], "tamaño") !==false) $attr_id = 24;

                if(strpos($option['name'], "Color") !==false) $attr_id = 23;
                if(strpos($option['name'], "color") !==false) $attr_id = 23;
                if(strpos($option['name'], "Couleur") !==false) $attr_id = 23;
                if(strpos($option['name'], "颜色") !==false) $attr_id = 23;
                if(strpos($option['name'], "FARBE") !==false) $attr_id = 23;
                if(strpos($option['name'], "farbe") !==false) $attr_id = 23;

                if(empty($attr_id)) {
                    $this->error($option['name']);
                    $error = 1;
                    continue;
                    //exit;
                }
                $this->info("attr id ". $attr_id);

                $values = $option['values'];
                foreach($values as $kky => $value) {
                    $this->info($value);
                    if($value==35 && $attr_id==23) {
                        var_dump($item);exit;
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

                    //var_dump($attr_opt_tran);exit;
                    foreach($this->locales as $kl => $locale) {
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

                    $LocalOptions[$attr_id][] = $attribute_option_id;
                }
                
            }

            if($error==1) continue;

            var_dump($LocalOptions);


            
            // add product

            $data = [];
            $data['attribute_family_id'] = 1;
            $data['sku'] = $item['product_id'];
            $data['type'] = "configurable";
            $super_attributes['color'] = $color;
            $super_attributes['size'] = $size;
            $data['super_attributes'] = $super_attributes;
            //$data['family'] = [];

            //var_dump($data);exit;
            

            // check product info
            $product = $this->productRepository->where("sku", $item['product_id'])->first();
            if(is_null($product)) {
                Event::dispatch('catalog.product.create.before');
                $product = $this->productRepository->create($data);
                $id = $product->id;
                Event::dispatch('catalog.product.create.after', $product);
            }else{
                $id = $product->id;
            }

            $this->clearCache($id);

            // update the sku sort
            foreach($LocalOptions as $key=>$LocalOption) {
                $cache_key = "product_attr_sort_".$key."_".$id;
                echo $cache_key."\r\n";
                foreach($LocalOption as $k => $localOpt) {
                    $redis->hSet($cache_key, $localOpt,  $k);
                }
                //$redis->hSet($this->cache_key.$this->prod_id, $key, json_encode($value));
            }

            //exit;
            
            //var_dump($product);exit;

            $updateData = [];
            $updateData['product_number'] = "";
            $updateData['name'] = $item['title'];
            $updateData['url_key'] = $item['product_id'];
            $updateData['short_description'] = $item['title'];
            $updateData['description'] = $item['title'];
            $updateData['new'] = 1;
            $updateData['featured'] = 1;
            $updateData['visible_individually'] = 1;
            $updateData['status'] = 1;
            $updateData['guest_checkout'] = 1;
            $updateData['channel'] = "default";
            $updateData['locale'] = $this->lang;
            $categories[] = $this->category_id;
            $updateData['categories'] = $categories;

            $updateData['description'] = $item['body_html'];

           // $updateData['compare_at_price'] = $item['compare_at_price'];
            $updateData['compare_at_price'] = $shopifyVariants[0]['compare_at_price'];
            $updateData['price'] = $shopifyVariants[0]['price'];

            $variants = $variantCollection = $product->variants()->get()->toArray();

            var_dump(count($shopifyVariants));

            $newShopifyVarants = [];
            $compare_at_price = '0.00';
            foreach($shopifyVariants as $sv => $shopifyVariant) {
                //var_dump($shopifyVariant);
                $newkey = $shopifyVariant['product_id'];
                $color = AttributeOption::where("attribute_id", 23)->where("admin_name", $shopifyVariant['option1'])->first();
                $size = AttributeOption::where("attribute_id", 24)->where("admin_name", $shopifyVariant['option2'])->first();

                if(is_null($color) || is_null($size)) {
                    $this->info("error");
                    var_dump($color, $size, $shopifyVariant);
                    exit;
                }

                $newkey .="_".$color->id."_".$size->id;

                $newShopifyVarant = [];

                $newShopifyVarant['id'] = $shopifyVariant['id'];
                $newShopifyVarant['price'] = $shopifyVariant['price'];
                $newShopifyVarant['title'] = $shopifyVariant['title'];
                $newShopifyVarant['weight'] = $shopifyVariant['weight'];
                $newShopifyVarant['sku'] = $shopifyVariant['sku'];
                $newShopifyVarant['option1'] = $shopifyVariant['option1'];
                $newShopifyVarant['option2'] = $shopifyVariant['option2'];
                $newShopifyVarant['image_src'] = $images_map[$shopifyVariant['image_id']];
                $newShopifyVarants[$newkey] = $newShopifyVarant;
                $compare_at_price = $shopifyVariant['compare_at_price'];
            }

            //var_dump($newShopifyVarants);exit;

            /**
             * 
             * variants[440][sku]: 8007538966776-variant-1375-1376
             * variants[440][name]: Variant 1375 1376
             * variants[440][price]: 0.0000
             * variants[440][weight]: 0
             * variants[440][status]: 1
             * variants[440][color]: 1375
             * variants[440][size]: 1376
             * variants[440][inventories][1]: 0
             * 
             * 
             */
            $newVariants = [];
            foreach($variants as $k => $variant) {
                //Log::info(json_encode($variant));
                //var_dump($variant);
                $newkey = $item['product_id']."_".$variant['color']."_".$variant['size'];
                if($variant['size']=='1403') {
                    //var_dump($variant);exit;
                }
                $this->info($newkey);
                if(!isset($newShopifyVarants[$newkey])) continue;
                //var_dump($newkey);exit;
                $newVariant['sku'] = $item['product_id'].'-'.$newShopifyVarants[$newkey]['id'];
                $newVariant['name'] = $newShopifyVarants[$newkey]['title'];
                $newVariant['price'] = $newShopifyVarants[$newkey]['price'];
                $newVariant['weight'] = "1000";
                $newVariant['status'] = 1;
                $newVariant['color'] = $variant['color'];
                $newVariant['size'] = $variant['size'];
                $newVariant['inventories'][1] = 1000;
                $categories[] = 5;
                $newVariant['categories'] = $categories;
                $newVariant['guest_checkout'] = 1;
                $newVariant['compare_at_price'] = $compare_at_price;
                $newVariants[$variant['id']] = $newVariant;
            }

            //var_dump(count($newVariants));exit;

            $updateData['variants'] = $newVariants;

            // images
            /**
             * 
             * 
             * 
             * images[files][32]: 
             * images[files][]: （二进制）
             * 
             * 
             */

             $arrContextOptions=array(
                "ssl"=>array(
                      "verify_peer"=>false,
                      "verify_peer_name"=>false,
                  ),
              ); 
            $images = [];
            foreach($shopifyImages as $key=>$shopifyImage) {

                $info = pathinfo($shopifyImage['src']);


                $this->info($info['filename']);
                $image_path = "product/".$id."/".$info['filename'].".webp";
                $local_image_path = "storage/".$image_path;
                $this->info(public_path($local_image_path));
                if(!file_exists(public_path($local_image_path))) {
                    $this->error("copy [ ".$local_image_path);
                    $this->info($shopifyImage['src']);
                    $contents = file_get_contents($shopifyImage['src'], false, stream_context_create($arrContextOptions));
                    //var_dump($contents);
                    Storage::disk("images")->put($local_image_path, $contents);
                    sleep(1);
                    //exit;
                    //var_dump($local_image_path);exit;
                }
                $images[] = $image_path;
            }

            $product = $this->productRepository->update($updateData, $id);

            Event::dispatch('catalog.product.update.after', $product);

            //更新对应的分类
            $sku_products = $this->productRepository->where("parent_id", $id)->get();
            foreach($sku_products as $key=>$sku) {

                $sku_image = explode("-", $sku->sku);



                //var_dump($images_map, $sku_image, $images_map[$sku_image[1]]);exit;

                $this->info("process ".$sku->id);

                Event::dispatch('catalog.product.create.after', $sku);

                $updateData = [];

                $updateData['new'] = 1;
                $updateData['featured'] = 1;
                $updateData['visible_individually'] = 1;
                $updateData['status'] = 1;
                $updateData['guest_checkout'] = 1;
                $updateData['channel'] = "default";
                $updateData['locale'] = $this->lang;
                $categories[] = $this->category_id;
                $updateData['categories'] = $categories;

                $this->productRepository->update($updateData, $sku->id);

                Event::dispatch('catalog.product.update.after', $sku);

                $images = [];
                $shopifyImages[] = ['src'=> $images_map[$sku_image[1]] ];
                foreach($shopifyImages as $key=>$shopifyImage) {

                    //var_dump($shopifyImage);
                    $info = pathinfo($shopifyImage['src']);
    
                    //var_dump($shopifyImage);
    
                    $this->info($info['filename']);
    
                    $image_path = "product/".$sku->id."/".$info['filename'].".webp";
                    $local_image_path = "storage/".$image_path;
                    $this->info(public_path($local_image_path));
                    if(!file_exists(public_path($local_image_path))) {
                        $this->error("copy [ ".$local_image_path);
                        $this->info($shopifyImage['src']);
                        $contents = file_get_contents($shopifyImage['src'], false, stream_context_create($arrContextOptions));
                        Storage::disk("images")->put($local_image_path, $contents);
                        sleep(1);
                    }
                    $images[] = $image_path;
                }
                $max_image_count = 3;
                $i = 0;
                foreach($images as $key=>$image) {
                    $i++;
                    if($max_image_count < $i) continue;
                    $checkImg = ProductImage::where("product_id", $sku->id)->where("path", $image)->first();
                    if(is_null($checkImg)) {
                        $checkImg = new ProductImage();
                        $checkImg->product_id = $sku->id;
                        $checkImg->path = $image;
                        $checkImg->type = "images";
                        $checkImg->save();
                    }
                }
            }


            Cache::pull("sync_".$item['product_id']);

            \Nicelizhi\Shopify\Helpers\Utils::clearCache($id, $item['product_id']); // clear cache

            //send message to wecome
            \Nicelizhi\Shopify\Helpers\Utils::send(config("app.name").' '.$item['product_id']. " sync done, please check it ");

            // exit;


            sleep(1);

        }

        Artisan::queue("onebuy:import:products:comment:from:judge",['--prod_id'=>$shopify_pro_id])->onConnection('redis')->onQueue('shopify-products'); // import the shopify comments
    }
}
