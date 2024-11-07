<?php

namespace Nicelizhi\Shopify\Console\Commands\Order;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderCommentRepository;
use Webkul\Admin\DataGrids\Sales\OrderDataGrid;

use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;


class Put extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:order:put';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Put Order info';

    private $shopify_store_id = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected ShopifyOrder $ShopifyOrder,
        protected ShopifyStore $ShopifyStore,
        protected OrderCommentRepository $orderCommentRepository
    )
    {
        $this->shopify_store_id = config('shopify.shopify_store_id');
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

        $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $this->shopify_store_id)->first();

        if(is_null($shopifyStore)) {
            $this->error("no store");
            return false;
        }
        $shopify = $shopifyStore->toArray();
        /**
         * 
         * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/order#put-orders-order-id
         * 
         */

         $pOrder = [];

        

        // $pOrder['id'] = 6257498915102;
        // $pOrder['financial_status'] = "pending";

        $pOrder['order'] = [
            "id" => 6257498915102,
            'transactions' => [],
            "financial_status" => "pending"
        ];

        var_dump($pOrder);
       

         $response = $client->put($shopify['shopify_app_host_name'].'/admin/api/2023-10/orders/6257498915102.json', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
            ],
            'body' => json_encode($pOrder)
        ]);

        $body = json_decode($response->getBody(), true);

        var_dump($body);

    }
}
