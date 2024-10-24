<?php

namespace Nicelizhi\Shopify\Console\Commands\Fulfillments;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Illuminate\Support\Facades\Cache;
use Nicelizhi\Shopify\Models\ShopifyOrder;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\Shipment;
use Illuminate\Http\Client\RequestException;
use GuzzleHttp\Exception\ClientException;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:fulfillments:create {--order_id=} {--data=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'shopify:fulfillments:create {--order_id=} {--data=}';

    private $shopify_store_id = null;
    private $lang = null;
    private $data = null;
    private $Order = null;
    private $ShopifyOrder = null;
    private $ShopifyStore = null;
    private $shipment = null;

    //protected ShopifyOrder $ShopifyOrder,
    //protected ShopifyStore $ShopifyStore,

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        
    )
    {
        $this->ShopifyOrder = new ShopifyOrder();
        $this->ShopifyStore = new ShopifyStore();
        $this->Order = new Order();
        //$this->shipment = new Shipment();

        $this->shipment = app(ShipmentRepository::class);

        $this->shopify_store_id = config('shopify.shopify_store_id');
        
        $this->lang = config('shopify.store_lang');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        try {

            $shopifyStore = Cache::get("shopify_store_".$this->shopify_store_id);

            if(empty($shopifyStore)){
                $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $this->shopify_store_id)->first();
                Cache::put("shopify_store_".$this->shopify_store_id, $shopifyStore, 3600);
            }


            if(is_null($shopifyStore)) {
                $this->error("no store");
                return false;
            }

            $shopify_order_id = $this->option("order_id");
            $req = $this->options("data");
            //$req = json_decode($req, true);

            Log::info("create req".json_encode($req['data']));


            $shopifyNewOrder = $this->ShopifyOrder->where([
                'shopify_store_id' => $this->shopify_store_id,
                'shopify_order_id' => $shopify_order_id
            ])->select(['order_id'])->first();

            if(is_null($shopifyNewOrder)) {
                Log::error("fulfillments_create ".$shopify_order_id);
                return false;
            }

            $order = $this->Order->findOrFail($shopifyNewOrder->order_id);

            if (!$order->canShip()) {
                Log::error("fulfillments_create cannot ship ".$shopify_order_id);
                return false;
            }

            // search local order_id and check it can send shippment

            $shipment = [];
            $shipment['carrier_title'] = $req['data']['tracking_company'];
            $shipment['track_number'] = $req['data']['tracking_number'];
            $shipment['source'] = 1;

            $products = $order->items;


            $line_items = [];

            foreach($products as $key=>$product) {
                $sku = $product['additional'];
                $skuInfo = explode('-', $sku['product_sku']);
                if(!isset($skuInfo[1])) {
                    $this->error("have error");
                    return false;
                }

                $line_item = [];
                $line_item['variant_id'] = $skuInfo[1];
                $line_item ['quantity'] = $product['qty_ordered'];
                //$line_item ['requires_shipping'] = true;
                //$line_item['item_id'] = $sku['variant_id'];
                $line_item['order_item_id'] = $product['id'];

                $line_items[$skuInfo[1]] = $line_item;

                //array_push($line_items, $line_item);
            }

            //var_dump($line_items);exit;

            
            $shipment_items = [];
            foreach($req['data']['line_items'] as $key=>$line_item) {
                if(isset($line_items[$line_item['variant_id']])) {
                    if($line_items[$line_item['variant_id']]['quantity']==$line_item['quantity']) {
                        $shipment_item = [];
                        $shipment_items[$line_items[$line_item['variant_id']]['order_item_id']][1] = $line_item['quantity'];
                    }
                }
            }

            //var_dump($shipment_items);exit;

            $shipment['items'] = $shipment_items;

            $data = [];
            $data['shipment'] = $shipment;


            $response = $this->shipment->create(array_merge($data, [
                'order_id' => $shopifyNewOrder->order_id,
            ]));

            Log::info("shipping response ". json_encode($response));

        } catch (\Exception $e) {
            Log::error('Job failed with error: ' . $e->getMessage());
            throw $e;
        } 
    }
    
}
