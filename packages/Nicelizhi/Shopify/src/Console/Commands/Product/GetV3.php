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
use Illuminate\Support\Facades\Artisan;

class GetV3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:product:getv3 {--prod_id=} {--force=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Products List or a product shopify:product:getv3 {--prod_id=} {--force=} 没有 sku场景';

    private $shopify_store_id = "";

    private $category_id = 0;

    private $lang = null;

    private $locales = [
        'us',
        'en',
        'fr',
        'nl',
        'tr',
        'es',
        'de',
        'it',
        'ru',
        'uk'
    ];

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

        //exit;
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
            ],
            'verify' => false,
            'curl' => [
                //CURLOPT_SSLVERSION => 3
                //CURLOPT_SSLVERSION => CURL_SSLVERSION_DEFAULT,
                CURLOPT_SSL_VERIFYPEER => false
            ],
        ]);

        $body = json_decode($response->getBody(), true);

        $body = $response->getBody();
        //Log::info($body);
        $body = json_decode($body, true);
        //var_dump($body);exit;
        foreach($body['products'] as $key=>$item) {
            //var_dump($item['collection_id']);exit;

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
        $items = \Nicelizhi\Shopify\Models\ShopifyProduct::where("shopify_store_id", $this->shopify_store_id)->where("product_id", $shopify_pro_id)->get();
        foreach($items as $key=>$item) {
            // if($item['product_id']!='8126562107640') continue;
            $this->info($item['product_id']);
            $options = $item->options;
            $shopifyVariants = $item->variants;
            
            $shopifyImages = $item->images;
            $color = [];
            $size = [];
            $error = 0;

            $shopifyImageMap = [];
            foreach($shopifyImages as $key=>$shopifyImage) {
                $shopifyImageMap[$shopifyImage['id']] = $shopifyImage['src'];
            }

            if(count($options) > 1 || count($shopifyVariants) > 1) {
                $this->error("please be sure your options values,pls don't have more than one");
                exit;
            }
            
            // add product

            $sku = $item['product_id'].'-'.$shopifyVariants[0]['id'];

            $data = [];
            $data['attribute_family_id'] = 1;
            $data['sku'] = $sku;
            $data['type'] = "simple";


            //var_dump($data);exit;
            Event::dispatch('catalog.product.create.before');

            // check product info
            $product = $this->productRepository->where("sku", $sku)->first();
            if(is_null($product)) {
                $product = $this->productRepository->create($data);
                $id = $product->id;
            }else{
                $id = $product->id;
            }
            Event::dispatch('catalog.product.create.after', $product);

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

            $updateData['compare_at_price'] = $shopifyVariants[0]['compare_at_price'];
            $updateData['price'] = $shopifyVariants[0]['price'];
            $updateData['weight'] = !empty($shopifyVariants[0]['weight']) ? $shopifyVariants[0]['weight'] : 1000 ;
            //var_dump($updateData, $item);exit;

            $variants = $variantCollection = $product->variants()->get()->toArray();

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


            $product = $this->productRepository->update($updateData, $id);

            Event::dispatch('catalog.product.update.after', $product);

            //var_dump($shopifyImages);exit;

            foreach($shopifyImages as $key=>$shopifyImage) {

                //var_dump($shopifyImage);
                $info = pathinfo($shopifyImage['src']);

                //var_dump($shopifyImage);

                $this->info($info['filename']);

                $image_path = "product/".$id."/".$info['filename'].".webp";
                $local_image_path = "storage/".$image_path;
                $this->info(public_path($local_image_path));
                if(!file_exists(public_path($local_image_path))) {
                    $this->error("copy [ ".$local_image_path);
                    $this->info($shopifyImage['src']);
                    $contents = file_get_contents($shopifyImage['src'], false, stream_context_create($arrContextOptions));
                    Storage::disk("images")->put($local_image_path, $contents);
                    sleep(1);
                }
                $images[$shopifyImage['id']] = $image_path;
                //var_dump($shopifyImage);
            }

            //var_dump($images);

            //exit;

            foreach($images as $key=>$image) {
                $checkImg = ProductImage::where("product_id", $id)->where("path", $image)->first();
                if(is_null($checkImg)) {
                    $checkImg = new ProductImage();
                    $checkImg->product_id = $id;
                    $checkImg->path = $image;
                    $checkImg->type = "images";
                    $checkImg->save();
                }
            }

            Cache::pull("sync_".$item['product_id']);

            \Nicelizhi\Shopify\Helpers\Utils::clearCache($id, $item['product_id']); // clear cache

            //send message to wecome
            \Nicelizhi\Shopify\Helpers\Utils::send(config("app.name").' '.$item['product_id']. " sync done, please check it ");

            sleep(1);
        }

        //Artisan::queue("onebuy:import:products:comment:from:judge")->onConnection('redis')->onQueue('shopify-products'); // import the shopify comments
        Artisan::queue("onebuy:import:products:comment:from:judge",['--prod_id'=>$shopify_pro_id])->onConnection('redis')->onQueue('shopify-products'); // import the shopify comments
    }
}
