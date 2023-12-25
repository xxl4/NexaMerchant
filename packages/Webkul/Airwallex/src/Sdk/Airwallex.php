<?php

namespace Nicelizhi\Airwallex\Sdk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Promise;
use Illuminate\Support\Facades\Cache;

class Airwallex {

    protected $clientEmail;

    protected $clientPassword;

    protected $clientId;

    protected $accountId;

    protected $paDC;

    protected $accountDC;

    protected $apiKey;

    protected $host = "https://api-demo.airwallex.com";

    /**
     * 
     * 
     * @param array $config
     * @param boolean $productMode
     * 
     * 
     */
    public function __construct($config=array(), $productionMode) {
        $this->clientEmail = $config['clientEmail'];
        $this->clientPassword = $config['clientPassword'];
        $this->clientId = $config['clientId'];
        $this->accountId = $config['accountId'];
        $this->paDC = $config['paDC'];
        $this->accountDC = $config['accountDC'];
        $this->apiKey = $config['apiKey'];

        if($productionMode==1) $this->host = "https://api.airwallex.com"; 
    }

    /**
     * 
     * get airwallex authentication
     * 
     * 
     */
    public function Authentication() {


        $cache_key = "airwallex_token";

        $token = Cache::get($cache_key);

        //var_dump($token);

        if(!Cache::has($cache_key)) {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => $this->host,
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
    
            $headers = [
                'x-client-id' => $this->clientId,
                'x-api-key'   => $this->apiKey
            ];
            //$body = "";
            //$request = new Request('POST', $this->host."/api/v1/authentication/login", $headers, $body);
            //$promise = $client->sendAsync($request);
            //$responses = Promise\Utils::unwrap($promise);
    
    
            $response = $client->request('POST', "/api/v1/authentication/login", [ 
                'headers' => [
                     'Accept' => 'application/json', 
                     'x-client-id' => $this->clientId, 
                     'x-api-key' => $this->apiKey, 
                ]
            ]);
    
            $body = $response->getBody();
            var_dump($body);
            $json = json_decode($body);
            Cache::put($cache_key, $json->token, 3600);
            return $json->token;
        }else{
            return $token;
        }
    }

    /**
     * 
     * create payment
     * 
     * 
     */
    public function CreatePayment($data) {
        $token = $this->Authentication();

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->host,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        //var_dump(json_decode($data));

        //var_dump($token, $data);

        var_dump(json_decode($data));

        $response = $client->request('POST', "/api/v1/pa/payment_intents/create", [ 
            'headers' => [
                 'Accept' => 'application/json', 
                 'Authorization' => "Bearer ".$token, 
            ],
            'json' => $data,
            'debug' => true
        ]);
        $body = $response->getBody();
        var_dump($body, $data, $token);
    }

    public function CheckPaymentStatus() {

    }


    public function CreateACard() {

    }

    public function GetBalances() {

    }

    /**
     * @link https://www.airwallex.com/docs/api#/Getting_Started
     * 
     */
    public function GetQuote() {

    }

    public function getPaymentMethods() {
        $paymentMethods = [];

        foreach (Config::get('payment_methods') as $paymentMethod) {
            
            $object = app($paymentMethod['class']);

            if ($object->isAvailable()) {
                $paymentMethods[] = [
                    'method'       => $object->getCode(),
                    'method_title' => $object->getTitle(),
                    'description'  => $object->getDescription(),
                    'sort'         => $object->getSortOrder(),
                ];
            }
        }

        usort ($paymentMethods, function($a, $b) {
            if ($a['sort'] == $b['sort']) {
                return 0;
            }

            return ($a['sort'] < $b['sort']) ? -1 : 1;
        });

        return $paymentMethods;
    }

}