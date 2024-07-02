<?php

namespace Webkul\Paypal\Console\Commands\Webhooks;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Paypal\Http\Request\Paypal\WebhooksListRequest;


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
        
        // 
        $smartButton = new SmartButton();
        $client = $smartButton->client();


        $accesstoken = $smartButton->getAccessToken();

        $response = $smartButton->WebhookList();

        var_dump($response);



        // https://developer.paypal.com/docs/api/webhooks/v1/#webhooks_post
        
        $body = [];

        $body['url'] = config('app.url')."/paypal/smart-button/v1/webhooks/dispute?uniqid=".uniqid();
        $event_types = array();
        // $event_types[] = [
        //     "name" => "CUSTOMER.DISPUTE.CREATED"
        // ];
        // $event_types[] = [
        //     "name" => "CUSTOMER.DISPUTE.RESOLVED"
        // ];
        // $event_types[] = [
        //     "name" => "CUSTOMER.DISPUTE.UPDATED"
        // ];
        // $event_types[] = [
        //     "name" => "RISK. DISPUTE.CREATED"
        // ];
       $event_types[] = ["name" => "CUSTOMER.DISPUTE.CREATED"];
       $event_types[] = ["name" => "CUSTOMER.DISPUTE.RESOLVED"];
       $event_types[] = ["name" => "CUSTOMER.DISPUTE.UPDATED"];
       //$event_types[] = ["name" => "RISK. DISPUTE.CREATED"]; //{"name":"VALIDATION_ERROR","message":"Invalid data provided","debug_id":"4e334ff3a2122","information_link":"https://developer.paypal.com/docs/api/webhooks/#errors","details":[{"field":"event_types[0].name","location":"body","issue":"Not a valid event name"}],"links":[]}

        $body['event_types'] = $event_types;

        var_dump($body);

        $response = $smartButton->createWebook($body);

        var_dump($response);

        sleep(1);
        
        $response = $smartButton->WebhookList();

        var_dump($response);

       
    }
}
