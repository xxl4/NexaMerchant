<?php
namespace Nicelizhi\OneBuy\Console\Commands\Order;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CartToOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:carttoorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'onebuy:carttoorder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected CartRepository $cartRepository
    )
    {
        parent::__construct();
    }

    private $cache_key = "faq";

    private $cart; 

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $cart_id = 0;

        // $this->cart = $this->cartRepository->findOneWhere([
        //     'id'   => $cart_id
        // ]);

        // Cart::setCart($this->cart);

        // //var_dump(Cart::prepareDataForOrder());

        // $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        // Cart::deActivateCart();

        $sql="SELECT o.id,o.status,t.order_id,o.created_at,p.method,p.additional from ba_orders as o left join ba_order_transactions as t on o.id=t.order_id LEFT join ba_order_payment as p on o.id=p.order_id where t.order_id is null and o.status = 'processing' and p.method='paypal_smart_button'";
        $orders = DB::select($sql);   

        foreach ($orders as $key => $order) {
            



        }
        
    }

    
}