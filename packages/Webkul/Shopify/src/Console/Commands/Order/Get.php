<?php

namespace Nicelizhi\Shopify\Console\Commands\Order;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Get extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:order:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Order List';

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
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/order#get-orders?status=any
         * 
         */
        $response = $client->get($shopify['shopify_app_host_name'].'/admin/api/2023-10/orders.json?status=any&limit=100', [
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
        foreach($body['orders'] as $key=>$item) {

            
           

        }
    }
}
