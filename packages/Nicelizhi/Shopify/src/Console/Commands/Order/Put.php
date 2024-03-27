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

        $shipping_amount = '9.99';
        $order_currency_code = 'USD';

         $shipping_lines = [
            'price' => $shipping_amount,
            "title" => "Standard Shipping",
            "price_set" => [
                'shop_money' => [
                    'amount' => $shipping_amount,
                    'currency_code' => $order_currency_code
                ],
                'presentment_money' => [
                    'amount' => $shipping_amount,
                    'currency_code' => $order_currency_code
                ]
            ]
        ];

        $pOrder['id'] = 5592770478310;
        $pOrder['shipping_lines'] = $shipping_lines;

        var_dump($pOrder);
       

         $response = $client->put($shopify['shopify_app_host_name'].'/admin/api/2023-10/orders/5592770478310.json', [
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
