<?php

namespace Nicelizhi\Shopify\Console\Commands\Product;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Put extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:product:put {product_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'edit Products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();

        $shopify = config("shopify");


        /**
         * 
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/product#get-products?ids=632910392,921728736
         * 
         */
        $response = $client->get($shopify['shopify_app_host_name'].'/admin/api/2023-10/products.json?fields=id,title,variants,options,images,product_type,body_html,tags,admin_graphql_api_id', [
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



        foreach($body['products'] as $key=>$item) {
            //Log::info(json_encode($item, true));
            
            //var_dump($item['id']);

            $shopifyProduct = \Nicelizhi\Shopify\Models\ShopifyProduct::where("id", $item['id'])->first();
            if(is_null($shopifyProduct)) {
                $shopifyProduct = new \Nicelizhi\Shopify\Models\ShopifyProduct();
                $shopifyProduct::create($item);
            }else{
                $shopifyProduct::update($item, $item['id']);
            }

        }
    }
}
