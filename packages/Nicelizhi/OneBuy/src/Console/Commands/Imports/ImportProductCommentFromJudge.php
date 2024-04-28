<?php
namespace Nicelizhi\OneBuy\Console\Commands\Imports;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Webkul\Product\Repositories\ProductRepository;

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(protected ProductRepository $productRepository)
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

        $client = new Client();

        $url = "https://judge.me/api/v1/reviews/count?shop_domain=".$shop_domain."&api_token=".$api_token."&rating=5";


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

        $url = "https://judge.me/api/v1/reviews?shop_domain=".$shop_domain."&api_token=".$api_token."&rating=5&page=".$page."&per_page=".$this->num;

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

        foreach($body['reviews'] as $key=>$item) {

            

            //var_dump($item);exit;
            if(!empty($item['title'])) {
                $this->error($this->cache_key.$item['product_external_id']);
                //$product = $this->productRepository->findBySlug($item['product_external_id']);
                
                $product = $this->productRepository->where("sku", $item['product_external_id'])->first();

                if($item['product_external_id']=='8532415938790') {
                    //var_dump($item);
                    //exit;
                    //var_dump($product);exit;
                }

                if(!is_null($product)) {
                    $this->error($this->cache_key.$product->id);
                    $len = $redis->hlen($this->cache_key.$product->id);

                    //var_dump($item);exit;
                
                    $this->info($len);
                    if($len < 6) {
                        $value = [];
                        $value['name'] = trim($item['reviewer']['name']);
                        $value['title'] = trim($item['title']);
                        $value['content'] = trim($item['body']);
                        //var_dump($value);exit;
                        $redis->hSet($this->cache_key.$product->id, $item['id'], json_encode($value));
                        $redis->hSet("onebuy_v2_product_comments_".$product->id, $item['id'], json_encode($value));
                    }

                    $this->error("onebuy_v2_product_comments_".$product->id);
                    $len = $redis->hlen("onebuy_v2_product_comments_".$product->id);
                    //var_dump($item);exit;
                
                    $this->info($len);
                    if($len < 6) {
                        $value = [];
                        $value['name'] = trim($item['reviewer']['name']);
                        $value['title'] = trim($item['title']);
                        $value['content'] = trim($item['body']);
                        //var_dump($value);exit;
                        //$redis->hSet($this->cache_key.$product->id, $item['id'], json_encode($value));
                        $redis->hSet("onebuy_v2_product_comments_".$product->id, $item['id'], json_encode($value));
                    }


                }
            } 
        }

    }
}