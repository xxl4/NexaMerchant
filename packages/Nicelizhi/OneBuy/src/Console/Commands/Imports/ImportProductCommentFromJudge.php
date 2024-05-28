<?php
namespace Nicelizhi\OneBuy\Console\Commands\Imports;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\Product\Repositories\ProductReviewAttachmentRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Event;

class ImportProductCommentFromJudge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:import:products:comment:from:judge {--prod_id=} {--force=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'onebuy:import:products:comment:from:judge {--prod_id=} {--force=}';

    protected $num = 0;

    protected $prod_id = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductReviewRepository $productReviewRepository,
        protected CustomerRepository $customerRepository,
        protected ProductReviewAttachmentRepository $productReviewAttachmentRepository
    )
    {
        $this->num = 100;
        parent::__construct();
    }

    private $cache_key = "checkout_v1_product_comments_";

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $shop_domain = config("onebuy.judge.shop_domain");
        $api_token = config("onebuy.judge.api_token");

        $this->prod_id = $this->option("prod_id");

        $client = new Client();

        $url = "https://judge.me/api/v1/reviews/count?shop_domain=".$shop_domain."&api_token=".$api_token;


        $this->info($url);

        // @link https://judge.me/api/docs#tag/Reviews
        try {
            $response = $client->get($url, [
                'http_errors' => true,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]);
        }catch(ClientException $e) {
           
        }

        $body = json_decode($response->getBody(), true);

        //var_dump($body['count']);exit;

        $count = $body['count'];
        $pages = ceil($count / $this->num);

        for($i=1; $i<=$pages; $i++) {
            $this->info($i." page start ");
            $this->GetFromComments($i);
            //exit;
        }
    }

    protected function GetFromComments($page) {
        $shop_domain = config("onebuy.judge.shop_domain");
        $api_token = config("onebuy.judge.api_token");

        $redis = Redis::connection('default');

        $client = new Client();

        $url = "https://judge.me/api/v1/reviews?shop_domain=".$shop_domain."&api_token=".$api_token."&page=".$page."&per_page=".$this->num;

        //$this->info($url);

        // @link https://judge.me/api/docs#tag/Reviews
        try {
            $response = $client->get($url, [
                'http_errors' => true,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]);
        }catch(ClientException $e) {
           
        }

        $body = json_decode($response->getBody(), true);

        $arrContextOptions=array(
            "ssl"=>array(
                  "verify_peer"=>false,
                  "verify_peer_name"=>false,
            ),
        );


        foreach($body['reviews'] as $key=>$item) {

            

            //var_dump($item);exit;
            if(!empty($item['title'])) {
                //$this->error($this->cache_key.$item['product_external_id']);
                //$product = $this->productRepository->findBySlug($item['product_external_id']);
                
               // $product = $this->productRepository->where("sku", $item['product_external_id'])->first();
                $product = $this->productRepository->findBySlug($item['product_external_id']);

                if(!empty($this->prod_id)) {
                    if($item['product_external_id']== $this->prod_id ) {
                        $this->info("Test ". json_encode($item));
                        var_dump($item, $product);
                        //exit;
                        sleep(10);
                        //continue;
                        //exit;
                        //var_dump($product);exit;
                    }
                }


                if(!is_null($product)) {
                    //$this->error($this->cache_key.$product->id);
                    

                    $product->id = empty($product->parent_id) ? $product->id : $product->parent_id;

                     //insert into db 

                    //$review = $this->productReviewRepository->findWhere(['title'=>$item['title'],'comment'=>$item['body'],'product_id'=>$product->id])->first();
                    $review =\Webkul\Product\Models\ProductReview::where('title', $item['title'])->where("comment", $item['body'])->where("product_id", $product->id)->first();
                    //var_dump($review,$item, $product->id);exit;
                    
                    if(!empty($this->prod_id)) {
                        if($item['product_external_id']== $this->prod_id ) {
                            //var_dump($review);
                        }
                    }
                    
                    $images = [];
                    //var_dump($review);
                    if(is_null($review)) {

                        //var_dump($item);exit;
                        if($item['reviewer']['name']=='Anonymous') continue;

                        

                        //check the email exist
                        $customer = $this->customerRepository->findOneByField('email', $item['reviewer']['email']);
                        if(!$customer) {
                            $data = [];
                            $data['email'] = $item['reviewer']['email'];
                            $data['customer_group_id'] = 2;
                            $name = explode("-", $item['reviewer']['name']);

                            $data['first_name'] = $name[0];
                            $data['last_name'] = isset($name[1]) ? $name[1] : "";
                            $data['gender'] = null;
                            $data['phone'] = $item['reviewer']['phone'];

                            $password = rand(100000, 10000000);
                            Event::dispatch('customer.registration.before');
                            $data = array_merge($data, [
                                'password'    => bcrypt($password),
                                'is_verified' => 1,
                            ]);
                            $this->customerRepository->create($data);
                            $customer = $this->customerRepository->findOneByField('email', $item['reviewer']['email']);
                        }



                        $data = [];
                        $data['name'] = trim($item['reviewer']['name']);
                        $data['title'] = trim($item['title']);
                        $data['comment'] = trim($item['body']);
                        $data['rating'] = $item['rating'];
                        $data['status'] = "pending";
                        $data['product_id'] = empty($product->parent_id) ? $product->id : $product->parent_id; // why the product sku id is not the same it?
                        $data['attachments'] = [];
                        $data['customer_id'] = $customer->id;
    
                        if($item['published']==true) $data['status'] = "approved";

                        if(!empty($this->prod_id)) {
                            if($item['product_external_id']== $this->prod_id ) {
                                var_dump($data, $product);
                            }
                        }


                
                        $review = $this->productReviewRepository->create($data);
                        
                        if(!empty($item['pictures'])) {

                            $attachments = [];
    
                            foreach($item['pictures'] as $key=>$picture) {
                                //var_dump($picture['urls']['original']);
    
                                $info = pathinfo($picture['urls']['original']);

                                array_push($images, $picture['urls']['original']);
    
                                //var_dump($info);exit;
    
                                $this->info($info['filename']);
                                $image_path = "product/".$product->id."/".$info['filename'].".jpg";
                                $local_image_path = $image_path;

                                
                                
                                $attachments = $this->productReviewAttachmentRepository->findWhere(['path'=>$picture['urls']['original'],'review_id'=>$review->id])->first();
                                if(!empty($attachments)) continue;

    
                                $contents = file_get_contents($picture['urls']['original'], false, stream_context_create($arrContextOptions));
                                Storage::disk("images")->put($local_image_path, $contents);
    
                                $mimeType = Storage::disk("images")->mimeType($local_image_path);

                                $fileType = explode('/', $mimeType);
    
                                $attachments = [];
                                $attachments['type'] = $fileType[0];
                                $attachments['mime_type'] = $fileType[1];
                                $attachments['path'] = $picture['urls']['original'];
                                $attachments['review_id'] = $review->id;
                                var_dump($attachments);
    
                                $this->productReviewAttachmentRepository->create($attachments);
    
    
                            }
                            
                        }
                    }
                    $len = $redis->hlen($this->cache_key.$product->id);
                    if($item['product_external_id']=='9344048005402') {
                        //var_dump($len, $this->cache_key.$product->id, empty($product->parent_id) ? $product->id : $product->parent_id);
                        //exit;
                    }
                    if($product->id==3768) {
                        //var_dump($len, $this->cache_key.$product->id);
                        //exit;
                    }
                    $this->info($len);
                    if($len < 6 && $item['published']==true) {
                        $value = [];
                        $value['name'] = trim($item['reviewer']['name']);
                        $value['title'] = trim($item['title']);
                        $value['content'] = trim($item['body']);
                        $value['rating'] = $item['rating'];
                        $value['images'] = $images;
                        //var_dump($value);exit;
                        $redis->hSet($this->cache_key.$product->id, $item['id'], json_encode($value));
                        //$redis->hSet("onebuy_v2_product_comments_".$product->id, $item['id'], json_encode($value));
                    }

                    //$this->error("onebuy_v2_product_comments_".$product->id);
                    $len = $redis->hlen("onebuy_v2_product_comments_".$product->id);
                    //var_dump($item);exit;
                
                    $this->info($len);
                    if($len < 6 && $item['published']==true) {
                        $value = [];
                        $value['name'] = trim($item['reviewer']['name']);
                        $value['title'] = trim($item['title']);
                        $value['content'] = trim($item['body']);
                        $value['rating'] = $item['rating'];
                        $value['images'] = $images;
                        //var_dump($value);exit;
                        //$redis->hSet($this->cache_key.$product->id, $item['id'], json_encode($value));
                        $redis->hSet("onebuy_v2_product_comments_".$product->id, $item['id'], json_encode($value));
                    }
                }
            } 
        }

    }
}
