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
    protected $signature = 'onebuy:paypal:order:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'paypal order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected SmartButton $smartButton,
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
        $orderID = "5JK60257HG619343A";
        
        $order = $this->smartButton->getOrder($orderID);

        var_dump($order);

    }
}