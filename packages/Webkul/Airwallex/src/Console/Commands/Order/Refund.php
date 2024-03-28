<?php

namespace Nicelizhi\Airwallex\Console\Commands\Order;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Nicelizhi\Airwallex\Sdk\Airwallex as AirwallexSdk;
use Webkul\Sales\Repositories\OrderRepository;

class Refund extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'airwallex:refund {--order_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'airwallex refund command';


    protected $clientEmail;

    protected $clientPassword;

    protected $clientId;

    protected $accountId;

    protected $paDC;

    protected $accountDC;

    protected $paymentConfig;

    /**
     * Flag indicating if production mode is enabled.
     *
     * @var bool
     */
    protected $productionMode;

    /**
     * API key for airwallex.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(protected OrderRepository $orderRepository)
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

        $order_id = $this->option("order_id");

        //$order_id = 8022;
        

        $order = $this->orderRepository->findOrFail($order_id);
        $payment_intent_id = $order->transactions->transaction_id;
        
        //var_dump($order);exit;



        var_dump($order->transactions->transaction_id);exit;


        $this->apiKey = core()->getConfigData('sales.payment_methods.airwallex.apikey');

        $this->clientId = core()->getConfigData('sales.payment_methods.airwallex.clientId');
        $this->productionMode = core()->getConfigData('sales.payment_methods.airwallex.production');


        $this->paymentConfig = [
            'clientId' => $this->clientId,
            'apiKey' => $this->apiKey
        ];

        var_dump($this->paymentConfig);

        $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);

        $sdk->createReRefund($payment_intent_id, $order_id, round($order->grand_total, 2));

        

        //@link https://www.airwallex.com/docs/api#/Payment_Acceptance/Customers/_api_v1_pa_customers__id__generate_client_secret/get

        
       
    }
}
