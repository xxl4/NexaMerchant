<?php

namespace Webkul\Paypal\Console\Commands\Webhooks;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Webkul\Paypal\Payment\SmartButton;

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
        
        $smartButton = new SmartButton();

       
    }
}
