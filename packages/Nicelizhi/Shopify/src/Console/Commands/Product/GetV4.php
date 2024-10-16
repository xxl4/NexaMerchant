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

class GetV4 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:product:getv4 {--prod_id=} {--force=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Products List or a product shopify:product:getv4 {--prod_id=} {--force=} color and size';

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

        $option1 = "color";
        $option2 = "size";

        $items = \Nicelizhi\Shopify\Models\ShopifyProduct::where("shopify_store_id", $this->shopify_store_id)->where("product_id", $shopify_pro_id)->get();
        foreach($items as $key=>$item) {
            $this->info($item['product_id']);

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

            $color = [];
            $size = [];
            $error = 0;
            $LocalOptions = [];
            $LocalOptions = \Nicelizhi\Shopify\Helpers\Utils::createOptions($options);

           //var_dump($LocalOptions, $options);exit;

            $color = $LocalOptions['color'];
            $size = $LocalOptions['size'];
            //var_dump($LocalOptions);
            
            // add product

            $data = [];
            $data['attribute_family_id'] = 1;
            $data['sku'] = $item['product_id'];
            $data['type'] = "configurable";
            $super_attributes['color'] = $color;
            $super_attributes['size'] = $size;
            $data['super_attributes'] = $super_attributes;

            $method = "create";

            // check product info
            $product = $this->productRepository->where("sku", $item['product_id'])->first();
            if(is_null($product)) {
                Event::dispatch('catalog.product.create.before');
                $product = $this->productRepository->create($data);
                $id = $product->id;
                Event::dispatch('catalog.product.create.after', $product);
            }else{

                $method = "update";
                $id = $product->id;

                //$data['channel'] = "default";

                //$this->productRepository->update($data, $id);

                //Event::dispatch('catalog.product.update.after', $product);

                
            }

            //var_dump($id);exit;

            //$this->clearCache($id);

            \Nicelizhi\Shopify\Helpers\Utils::clearCache($id, $item['product_id']); // clear cache

            // update the sku sort
            foreach($LocalOptions['LocalOptions'] as $key=>$LocalOption) {
                $cache_key = "product_attr_sort_".$key."_".$id;
                echo $cache_key."\r\n";
                foreach($LocalOption as $k => $localOpt) {
                    $redis->hSet($cache_key, $localOpt,  $k);
                }
                //$redis->hSet($this->cache_key.$this->prod_id, $key, json_encode($value));
            }

            $variants = $variantCollection = $product->variants()->get()->toArray();

            //exit;
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
            $categories = [];
            $categories[] = $this->category_id;
            $updateData['categories'] = $categories;

            $updateData['description'] = $item['body_html'];

           // $updateData['compare_at_price'] = $item['compare_at_price'];
            $updateData['compare_at_price'] = $shopifyVariants[0]['compare_at_price'];
            $updateData['price'] = $shopifyVariants[0]['price'];

            $variants = $variantCollection = $product->variants()->get()->toArray();

            $newShopifyVarants = [];
            $compare_at_price = '0.00';
            foreach($shopifyVariants as $sv => $shopifyVariant) {
                //var_dump($shopifyVariant);
                $newkey = $shopifyVariant['product_id'];
                $color = AttributeOption::where("attribute_id", 23)->where("admin_name", $shopifyVariant['option1'])->first();
                if(is_null($color)) {
                    $option1 = "size";
                    $color = AttributeOption::where("attribute_id", 23)->where("admin_name", $shopifyVariant['option2'])->first();
                }
                $size = AttributeOption::where("attribute_id", 24)->where("admin_name", $shopifyVariant['option2'])->first();
                if(is_null($size)) {
                    $option1 = "color";
                    $size = AttributeOption::where("attribute_id", 24)->where("admin_name", $shopifyVariant['option1'])->first();
                }

                if(is_null($color) || is_null($size)) {
                    $this->info("error");
                    var_dump($color, $size, $shopifyVariant['option1'],$shopifyVariant['option2'], $shopifyVariant);
                    exit;
                }

                $newkey .="_".$color->id."_".$size->id;

                $newShopifyVarant = [];

                $newShopifyVarant['id'] = $shopifyVariant['id'];
                $newShopifyVarant['price'] = $shopifyVariant['price'];
                $newShopifyVarant['title'] = $shopifyVariant['title'];
                $newShopifyVarant['weight'] = $shopifyVariant['weight'];
                $newShopifyVarant['sku'] = $shopifyVariant['sku'];
                $newShopifyVarant['option1'] = $option1=="color" ?  $shopifyVariant['option1'] : $shopifyVariant['option2'];
                $newShopifyVarant['option2'] = $option2=="size" ? $shopifyVariant['option2'] : $shopifyVariant['option1'];
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

            // while method  eq update
            if($method=="update") {
                $newVariants = []; 
                $i = 1;
                $variant_images = [];
                foreach($shopifyVariants as $key=>$shopifyVariant) {
                    $variant_images[$shopifyVariant['id']] = $shopifyVariant['image_id'];
                    //var_dump($shopifyVariant);
                    $newVariant = [];
                    $newVariant['sku'] = $item['product_id'].'-'.$shopifyVariant['id'];
                    $newVariant['name'] = $shopifyVariant['title']; 
                    $newVariant['price'] = $shopifyVariant['price'];
                    $newVariant['weight'] = "1000";
                    $newVariant['status'] = 1;
                    //$attr_option = AttributeOption::where("attribute_id", 23)->where("admin_name", $value)->first();

                    $newVariant['color'] = $this->getAttr($LocalOptions['color_mapp'], $shopifyVariant['option1'], $shopifyVariant['option2'], $shopifyVariant['option3']);
                    $newVariant['size'] = $this->getAttr($LocalOptions['size_mapp'], $shopifyVariant['option1'], $shopifyVariant['option2'], $shopifyVariant['option3']);

                    

                    $newVariant['inventories'][1] = 1000;
                    $categories = [];
                    $categories[] = 5;
                    //$newVariant['categories'] = $categories;
                    //$newVariant['guest_checkout'] = 1;
                    //$newVariant['compare_at_price'] = $shopifyVariant['compare_at_price'];

                    //base use sku for the variant check

                    $variant = $this->productRepository->where("sku", $item['product_id'].'-'.$shopifyVariant['id'])->select(['id'])->first();

                    //need update the product size

                    if(is_null($variant)) {
                        $this->error($shopifyVariant['title'].'--'.$newVariant['color'].'--'.$newVariant['size'].'--variant_'.$i);
                        $newVariants["variant_".$i] = $newVariant;
                    }else{
                        $var_product = [];

                       // $var_product['new'] = 1;
                       // $var_product['featured'] = 1;
                        $var_product['visible_individually'] = 1;
                        $var_product['name'] = $shopifyVariant['title']; 
                        $var_product['status'] = 1;
                        $var_product['guest_checkout'] = 1;
                        $var_product['channel'] = "default";
                        $var_product['locale'] = $this->lang;
                        $var_product[] = $this->category_id;
                        $var_product['categories'] = $categories;
                        $var_product['color'] = $this->getAttr($LocalOptions['color_mapp'], $shopifyVariant['option1'], $shopifyVariant['option2'], $shopifyVariant['option3']);
                        $var_product['size'] = $this->getAttr($LocalOptions['size_mapp'], $shopifyVariant['option1'], $shopifyVariant['option2'], $shopifyVariant['option3']);

                        Event::dispatch('catalog.product.update.before', $variant->id);
                        $var_product = $this->productRepository->update($var_product, $variant->id);

                        Event::dispatch('catalog.product.update.after', $var_product);



                        $this->error($shopifyVariant['title'].'--'.$newVariant['color'].'--'.$newVariant['size'].'--'.$variant->id);
                        $newVariants[$variant->id] = $newVariant;
                    }
                    $i++;
                }

                $updateData['variants'] = $newVariants;
                //var_dump($updateData['variants']);
            }
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
                }
                $images[] = $image_path;
            }

            //var_dump($images);exit;

            Event::dispatch('catalog.product.update.before', $id);
            $product = $this->productRepository->update($updateData, $id);
            Event::dispatch('catalog.product.update.after', $product);

            //Log::info(json_encode($updateData));

            //var_dump($updateData, $id);exit;

            //更新对应的分类
            $sku_products = $this->productRepository->where("parent_id", $id)->get();
            foreach($sku_products as $key=>$sku) {

                $sku_image = explode("-", $sku->sku);
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
                $shopifyImages = [];
                $shopifyImages[] = ['src'=> $images_map[$sku_image[1]] ];
                foreach($shopifyImages as $key=>$shopifyImage) {

                    $this->error($sku->id);
                    $this->error($shopifyImage['src']);

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


            // exit;
            Cache::pull("sync_".$item['product_id']);

            \Nicelizhi\Shopify\Helpers\Utils::clearCache($id, $item['product_id']); // clear cache

            //send message to wecome
            \Nicelizhi\Shopify\Helpers\Utils::send(config("app.name").' '.$item['product_id']. " sync done, please check it ");


            sleep(1);
            //var_dump($product);exit;
            

            //var_dump($product);exit;

            // add product_attr


            // add product_images
            // add product_sku



        }

        //Artisan::queue("onebuy:import:products:comment:from:judge")->onConnection('redis')->onQueue('shopify-products'); // import the shopify comments
        Artisan::queue("onebuy:import:products:comment:from:judge",['--prod_id'=>$shopify_pro_id])->onConnection('redis')->onQueue('shopify-products'); // import the shopify comments
    }

    private function getAttr($options, $val, $val2="", $val3="") {
        if(isset($options[$val])) return $options[$val];
        if(isset($options[$val2])) return $options[$val2];
        if(isset($options[$val3])) return $options[$val3];
    }
}
