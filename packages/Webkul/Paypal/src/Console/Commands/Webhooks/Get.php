<?php

namespace Webkul\Paypal\Console\Commands\Webhooks;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Nicelizhi\Airwallex\Sdk\Airwallex as AirwallexSdk;

class Get extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paypal:webhook:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get paypal webhook';


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

        $this->apiKey = core()->getConfigData('sales.payment_methods.airwallex.apikey');

        $this->clientId = core()->getConfigData('sales.payment_methods.airwallex.clientId');
        $this->clientEmail = core()->getConfigData('sales.payment_methods.airwallex.clientEmail');
        $this->clientPassword = core()->getConfigData('sales.payment_methods.airwallex.clientPassword');
        $this->accountId = core()->getConfigData('sales.payment_methods.airwallex.accountId');
        $this->paDC = core()->getConfigData('sales.payment_methods.airwallex.paDC');
        $this->accountDC = core()->getConfigData('sales.payment_methods.airwallex.accountDC');

        $this->paymentConfig = [
            'clientId' => $this->clientId,
            'apiKey' => $this->apiKey,
            'clientEmail' => $this->clientEmail,
            'clientPassword' => $this->clientPassword,
            'accountId' => $this->accountId,
            'paDC' => $this->paDC,
            'accountDC' => $this->accountDC,
        ];

        $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);

        $token = $sdk->Authentication();

        $input = [];

        $input['events'] = [
            'subscription.created',
            'subscription.updated',
            'subscription.cancelled',
            'invoice.sent',
            'invoice.paid',
            'invoice.payment_failed',
            'invoice.payment_attempt_failed'
        ];

        $input['request_id'] = time();
        $input['url'] = "https://shop.hatmeo.com/api/airwallex/webhook";
        $input['version'] = time();

        $sdk->createWebhook(json_encode($input));


       
    }
}
