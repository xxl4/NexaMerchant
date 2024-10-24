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
        //$orderID = "299893062V619310L";

       $orderID = $this->option('order_id');

       return $this->getCart($orderID);

        // preg_match_all('/\d+/', $orderID, $matches);

        $this->checkLogFile();

        return false;


        $file = storage_path('app/order.csv');
        $content = file_get_contents($file);
        $lines = explode("\n", $content);

        $file2 = storage_path('app/orders_export_1.csv');
        $content2 = file_get_contents($file2);

        foreach($lines as $line) {
            $email = trim($line);

            // use email to preg_match $content2

            preg_match_all('/'.$email.'/', $content2, $matches);

            if(count($matches[0]) > 0) {
                $this->info($email);
            }
            

        }

        


    }

    private function checkLogFile() {
        $preg_match = '/Paypal Smart Transaction Details:(.*)"intent":"CAPTURE","status":"APPROVED","payment_source":\{"paypal":\{"email_address":"(.*)","account_id/';

            $file = storage_path('logs/laravel-2024-08-14.log');
            $this->error($file);
    
            $content = file_get_contents($file);
    
            preg_match_all($preg_match, $content, $matches);
    
            //var_dump($matches[2]);
    
            foreach($matches[2] as $email) {
                $this->info($email);
            }
    }


    private function getCart($orderID)
    {
        //$orderID = $this->option('order_id');

        var_dump($orderID);

        if($orderID) {

            $smartButton = new SmartButton();
            $order = $smartButton->getOrder($orderID);
            //$ca = $smartButton->captureOrder($orderID);

            var_dump($order);
        }

           
    }
}