<?php

namespace Nicelizhi\Shopify\Console\Commands\Product;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Shopify\Rest\Admin2023_10\Product;
use Shopify\Utils;

class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:product:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Products';

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

        $res = \Shopify\Context::initialize(
            apiKey: $shopify['shopify_client_id'],
            apiSecretKey: $shopify['shopify_client_secret'],
            scopes: 'products',
            hostName: $shopify['shopify_app_host_name'],
            sessionStorage: new \Shopify\Auth\FileSessionStorage('/tmp/php_sessions'),
            apiVersion: '2023-10',
           // isEmbeddedApp: true,
            isPrivateApp: true,
        );

        var_dump($shopify);


        /**
         * 
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/product#post-products
         * 
         */
        
        

        $requestHeaders = array(
            'api_version' => '2023-10',
            'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
        );

        $requestCookies = array();
        $isOnline = false;

        $this->test_session = Utils::loadCurrentSession(
            $requestHeaders,
            $requestCookies,
            $isOnline
        );

        $product = new Product($this->test_session);

        var_dump($product);


        $body = json_decode($response->getBody(), true);

        $body = $response->getBody();
        $body = json_decode($body, true);

    }
}
