<?php

namespace Nicelizhi\Airwallex\Sdk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

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
    public function __construct($config, $productionMode) {
        $this->clientEmail = $config['clientEmail'];
        $this->clientPassword = $config['clientPassword'];
        $this->clientId = $config['clientId'];
        $this->accountId = $config['accountId'];
        $this->paDC = $config['paDC'];
        $this->accountDC = $config['accountDC'];
        $this->apiKey = $config['apiKey'];
    }

    /**
     * 
     * get airwallex authentication
     * 
     * 
     */
    public function Authentication() {
        $headers = [
            'x-client-id' => $this->clientId,
            'x-api-key'   => $this->apiKey
        ];
        $body = [];
        $request = new Request('POST', $this->host."/api/v1/authentication/login", $headers, $body);
        $promise = $client->sendAsync($request);
        return $promise;
    }

    /**
     * 
     * create payment
     * 
     * 
     */
    public function CreatePayment() {

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

}