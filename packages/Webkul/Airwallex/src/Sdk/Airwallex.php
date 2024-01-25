<?php

namespace Nicelizhi\Airwallex\Sdk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Promise;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Airwallex {

    protected $clientId;
    protected $apiKey;

    protected $host = "https://api-demo.airwallex.com";

    protected $client;

    protected $token;

    protected $productionMode;

    /**
     * 
     * 
     * @param array $config
     * @param boolean $productMode
     * 
     * 
     */
    public function __construct($config=array(), $productionMode) {
        $this->clientId = $config['clientId'];
        $this->apiKey = $config['apiKey'];

        $this->productionMode = $productionMode;

        if($productionMode=='on') $this->host = "https://api.airwallex.com"; 

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->host,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        // token

        $this->token = $this->Authentication();
    }

    /**
     * 
     * get airwallex authentication
     * 
     * 
     */
    public function Authentication() {


        $cache_key = "airwallex_token_".$this->productionMode;

        $token = Cache::get($cache_key);

        if(!Cache::has($cache_key)) {
        //if(true) {
            $response = $this->client->request('POST', "/api/v1/authentication/login", [ 
                'headers' => [
                     'Accept' => 'application/json', 
                     'content-type' => 'application/json',
                     'x-client-id' => $this->clientId, 
                     'x-api-key' => $this->apiKey, 
                ]
            ]);
    
            $body = $response->getBody();
            Log::info("token".json_encode($body));
            $json = json_decode($body);
            Cache::put($cache_key, $json->token, 1800);
            return $json->token;
        }else{
            return $token;
        }
    }

    /**
     * 
     * create payment
     * @link https://www.airwallex.com/docs/api#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents_create/post
     * 
     */
    public function CreatePayment($data) {
        $header= array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data),
                'Authorization: ' ."Bearer ".$this->token
        );

        $url = $this->host."/api/v1/pa/payment_intents/create";

        $result = $this->http_curl($url, 'xml', $data, 6, FALSE, '',$header);

        if($result['code']=='201') return json_decode($result['body']);

        return $result;

    }

    /**
     * 
     * 
     * @link https://www.airwallex.com/docs/payments__global__klarna-beta__desktopmobile-website-browser
     * 
     */

    public function confirm($payment_intents_id, $data) {
        $header= array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data),
                'Authorization: ' ."Bearer ".$this->token
        );

        $url = $this->host."/api/v1/pa/payment_intents/".$payment_intents_id."/confirm";

        $result = $this->http_curl($url, 'xml', $data, 6, FALSE, '',$header);

        if($result['code']=='201') return json_decode($result['body']);

        return $result;
    }

    /**
     * 
     * 注意授权方式有差异
     * @param json input
     * 
     * 
     */
    public function createWebhook($input) {
        $response = $this->client->request('POST', "/api/v1/webhooks/create", [ 
            'headers' => [
                 'Accept' => 'application/json', 
                 'content-type' => 'application/json',
                 'Authorization' => "Basic ".$this->clientId, 
            ],
            'json' => $input,
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

    /**
     * 
     * SDK get payment methods
     * @return array
     * 
     */
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

    function http_curl($url, $method, $params, $timeout=10, $https=FALSE, $isReturnHead='', $curlheader=''){
        $curl = curl_init();
        
        $parastr = '';
        if(strtolower($method) == 'xml'){
            $parastr = $params;
        }else{
            if(!empty($params)){
                foreach ($params as $key => $value) {
                    $parastr .= $key . '=' . urlencode($value) . '&';
                }
                $parastr = substr($parastr, 0, -1);
            }
        }
        
        if(strtolower($method) == 'post' || strtolower($method) == 'xml'){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $parastr);
        }else{
            curl_setopt($curl, CURLOPT_URL, $url . '?' . $parastr);
        }
        if($https){
            curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);
        }
        if($isReturnHead){//返回response头部信息
            curl_setopt($curl, CURLOPT_HEADER, 1);   
        }else{
            curl_setopt($curl, CURLOPT_HEADER, 0);
        }
        if($curlheader){
            curl_setopt($curl,CURLOPT_HTTPHEADER,$curlheader);
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout - 1);
        //调试时打开
        //curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resp['body'] = curl_exec($curl);
        $resp['code'] = trim(curl_getinfo($curl, CURLINFO_HTTP_CODE));
        //$resp['debug'] = curl_getinfo($curl);
        $errno = curl_errno($curl);
        if($errno != 0){
            $resp['code'] = $errno;
            $resp['body'] = curl_error($curl);
        }
        curl_close($curl);
        return $resp;
    }

}