<?php
namespace Nicelizhi\OneBuy\Console\Commands\Paypal;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Paypal\Payment\SmartButton;

class OrderGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:paypal:order:get {--order_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'paypal order onebuy:paypal:order:get {--order_id=}';

    private $smartButton;
    private $orderRepository;
    private $cartRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        
    )
    {

        // protected SmartButton $smartButton,
        // protected OrderRepository $orderRepository,
        // protected CartRepository $cartRepository

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
        $orderID = "299893062V619310L";

        $order_id = $this->option('order_id');

        if($order_id) {
            $order = $this->smartButton->getOrder($orderID);

            var_dump($order);
        }
        


    }
}