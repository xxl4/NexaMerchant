<?php

namespace Nicelizhi\Airwallex\Payment;

use Illuminate\Support\Facades\Log;

use Nicelizhi\Airwallex\Sdk\Airwallex as AirwallexSdk;
use Webkul\Checkout\Facades\Cart;
use Webkul\Payment\Payment\Payment;
use Webkul\Sales\Repositories\OrderRepository;

class Airwallex extends Payment
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'airwallex';

    protected $title = "airwallex";

    protected $sort = 5;

    protected $description = "airwallex payment";

    protected $clientEmail;

    protected $clientPassword;

    protected $clientId;

    protected $accountId;

    protected $paDC;

    protected $accountDC;

    /**
     * API key for airwallex.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Flag indicating if production mode is enabled.
     *
     * @var bool
     */
    protected $productionMode;

    protected $paymentConfig;

    /**
     * OrderRepository object.
     *
     * @var array
     */
    protected $orderRepository;

    /**
     * Create a new instance.
     *
     * @param OrderRepository $orderRepository The order repository instance.
     */
    public function __construct(
        OrderRepository $orderRepository
    )
    {


        $this->apiKey = core()->getConfigData('sales.payment_methods.airwallex.apikey');

        $this->clientId = core()->getConfigData('sales.payment_methods.airwallex.clientId');
        $this->clientEmail = core()->getConfigData('sales.payment_methods.airwallex.clientEmail');
        $this->clientPassword = core()->getConfigData('sales.payment_methods.airwallex.clientPassword');
        $this->accountId = core()->getConfigData('sales.payment_methods.airwallex.accountId');
        $this->paDC = core()->getConfigData('sales.payment_methods.airwallex.paDC');
        $this->accountDC = core()->getConfigData('sales.payment_methods.airwallex.accountDC');

        $this->orderRepository = $orderRepository;

        $this->paymentConfig = [
            'clientId' => $this->clientId,
            'apiKey' => $this->apiKey,
            'clientEmail' => $this->clientEmail,
            'clientPassword' => $this->clientPassword,
            'accountId' => $this->accountId,
            'paDC' => $this->paDC,
            'accountDC' => $this->accountDC,
        ];


        $this->productionMode = core()->getConfigData('sales.payment_methods.airwallex.production');
        //var_dump($this->productionMode);
    }

    /**
     * Return all available payment methods from Airwallex
     *
     * @return array
     */
    public function getAvailablePaymentMethods()
    {
        $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);

        //$paymentMethods = $sdk->getPaymentMethods();

        return [
            'payment_methods'  => $sdk->getPaymentMethods()
        ];

        //var_dump($paymentMethods);


        $result = [];

        foreach ($paymentMethods as $paymentMethod) {
            $result[] = [
                'id' => $paymentMethod['method'],
                'name' => $paymentMethod['method_title'],
                //'logo' => $paymentMethod-> getLargeIconUrl(),
            ];
        }

        return $result;
    }

    /**
     * Get the payment status for a specific order ID.
     *
     * @param int $orderId The ID of the order for which to retrieve the payment status.
     *
     * @return \MultiSafepay\Api\Transactions\Transaction The payment transaction object.
     */
    public function getPaymentStatusForOrder($orderId)
    {
        $sdk = new Sdk($this->paymentConfig, $this->productionMode);
        $transaction = $sdk->getTransactionManager()->get($orderId);

        return $transaction;
    }

    /**
     * Get the redirect URL for MultiSafepay payment.
     *
     * @return string
     */
    public function getRedirectUrl()
    {

        $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);

        if ($this->apiKey) {
            $cart = $this->getCart();

            $billingAddress = $cart->billing_address;
            $shippingAddress = $cart->shipping_address;
                        
            $cartItems = $this->getCartItems();

            
            
            $order = $this->orderRepository->create(Cart::prepareDataForOrder());

            if ($order) {
                
                session(['order' => $order]);

                $orderId = $order->id;

                
                $transactionManager = $this->createPaymentOrder($cart, $orderId);

                

                // 页面跳转

                return $transactionManager;
            }
        }
    }

    /**
     * 
     * 
     */
    public function createPaymentOrder($cart, $orderId, $customer_id=null) {

      $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);

      $buildRequestBody = $this->buildCreateOrderData($cart, $orderId, $customer_id);
      //var_dump($buildRequestBody);
      $transactionManager = $sdk->CreatePayment(json_encode($buildRequestBody, JSON_OBJECT_AS_ARRAY | JSON_UNESCAPED_UNICODE));

      // 针对生成订单后，需要和订单关联起来，从而在回告的过程中，好识别

      //var_dump($transactionManager);

      return $transactionManager;
    }

    /**
     * 
     * create customer
     * 
     * 
     */
    public function createCustomer($cart, $orderId) {
            
        $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);
    
        $buildRequestBody = $this->buildCreateCustomerData($cart, $orderId);

        //var_dump($buildRequestBody);

        $transactionManager = $sdk->createCustomer(json_encode($buildRequestBody, JSON_OBJECT_AS_ARRAY | JSON_UNESCAPED_UNICODE));
    
        return $transactionManager;
    }

    public function createCustomerClientSecret($customer_id) {
        $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);
        // $buildRequestBody = [];
        // $buildRequestBody['customer_id'] = $customer_id;
        // $buildRequestBody['request_id'] = $customer_id."_".time();
        $transactionManager = $sdk->createCustomerClientSecret($customer_id);
        
        return $transactionManager;
    }

    public function buildCreateCustomerData($cart, $orderId) {

        $data = [];

        //search email from customer table
        $customer = \Webkul\Customer\Models\Customer::where('email', $cart->billing_address->email)->first();
        if(is_null($customer)) {
            $customer = new \Webkul\Customer\Models\Customer();
            $customer->first_name = $cart->billing_address->first_name;
            $customer->last_name = $cart->billing_address->last_name;
            $customer->email = $cart->billing_address->email;
            //$customer->phone = $cart->billing_address->phone;
            $customer->password = bcrypt("123456");
            //$customer->channel_id = 1;
            $customer->status = 1;
            $customer->save();
        }

        /**
         * 
         * 
         * 
         * 
         */
        $address = [];
        $address['city'] = $cart->billing_address->city;
        $address['country_code'] = $cart->billing_address->country;
        $address['postcode'] = $cart->billing_address->postcode;
        $address['state'] = $cart->billing_address->city;
        $address['street'] = $cart->billing_address->address1;
        $data['address'] = $address;
        $data['email'] = $cart->billing_address->email;
        $data['first_name'] = $cart->billing_address->first_name;
        $data['last_name'] = $cart->billing_address->last_name;
        $data['phone_number'] = $cart->billing_address->phone;
        $data['merchant_customer_id'] = $customer->id.'_'.$orderId;
        $data['request_id'] = $customer->id.'_'.$orderId."_".time();
        $data['metadata']['id'] = $customer->id;
        $data['metadata']['platform'] = "nexa-merchant";

        return $data;


    }

    /**
     * 
     * create payment authen
     * @https://www.airwallex.com/docs/payments__global__apple-pay__embedded-elements
     * 
     * 
     */
    public function createPaymentAuthen($cart, $orderId) {

      $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);

      $buildRequestBody = $this->buildAuthenOrderData($cart, $orderId);
      //var_dump($buildRequestBody);
      $transactionManager = $sdk->CreatePayment(json_encode($buildRequestBody, JSON_OBJECT_AS_ARRAY | JSON_UNESCAPED_UNICODE));

      // 针对生成订单后，需要和订单关联起来，从而在回告的过程中，好识别

      //var_dump($transactionManager);

      return $transactionManager;
    }

    public function confirmPayment($payment_intents_id, $order, $customer_id=null) {
      $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);
      $buildRequestBody = [];
      $payment_method = [];
      $payment_method['type'] = "card";

      $shipping_address = $order->billing_address;
      //var_dump($shipping_address);

      $klarna = [];
      $klarna['country_code'] = $shipping_address->country;
      $klarna['language'] = app()->getLocale();
      $billing = [];
      //$billing['data_of_birth'] = "";
      $billing['email'] = $order->customer_email;
      $billing['first_name'] = $order->customer_first_name;
      $billing['last_name'] = $order->customer_last_name;
      //$billing['personal_id'] = "";
      $billing['phone_number'] = $shipping_address->phone;
      $address = [];
      $address['country_code'] = $shipping_address->country;
      $address['state'] = $shipping_address->state;
      $address['city'] = $shipping_address->city;
      $address['street'] = $shipping_address->address1." ".$shipping_address->address2;
      $address['postcode'] = $shipping_address->postcode;
      $billing['address'] = $address;
      //$billing['personal_id'] = "";
      $klarna['billing'] = $billing;


      $payment_method['card'] = $klarna;
      $buildRequestBody['payment_method'] = $payment_method;
      $buildRequestBody['request_id'] = $order->id."_".time();


      $payment_method_options = [];
      $payment_method_options["klarna"]["auto_capture"] = true;
      $buildRequestBody['payment_method_options'] = $payment_method_options;

      if($customer_id) {
        $buildRequestBody['customer_id'] = $customer_id;
    }

      

     // var_dump($order, $buildRequestBody);exit;
      //var_dump($buildRequestBody);
      $transactionManager = $sdk->confirm($payment_intents_id, json_encode($buildRequestBody, JSON_OBJECT_AS_ARRAY | JSON_UNESCAPED_UNICODE));

      return $transactionManager;
      
    }

    public function buildAuthenOrderData($cart, $orderId) {
        //$cart = Cart::getCart();

        $data = [];
        $amount = (float) $cart->sub_total + $cart->tax_total + ($cart->selected_shipping_rate ? $cart->selected_shipping_rate->price : 0) - $cart->discount_amount;
        $data['amount'] = round($amount, 2, PHP_ROUND_HALF_UP);
        $data['currency'] = $cart->cart_currency_code;
        $data['merchant_order_id'] = $orderId;
        $data['request_id'] = $orderId."_".time();
        $data['return_url'] = route('airwallex.payment.success');
        return $data;

    }

    /**
     * 
     * @link https://www.airwallex.com/docs/api#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents_create/post
     * build data for post
     * 
     * 
     */
    public function buildCreateOrderData($cart, $orderId, $customer_id=null) {
        //$cart = Cart::getCart();

        $data = [];
        $amount = (float) $cart->sub_total + $cart->tax_total + ($cart->selected_shipping_rate ? $cart->selected_shipping_rate->price : 0) - $cart->discount_amount;
        $data['amount'] = round($amount, 2, PHP_ROUND_HALF_UP);
        $data['amount'] = $cart->grand_total;
        $data['currency'] = $cart->cart_currency_code;
        $customer = [];
        $address['city'] = $cart->billing_address->city;
        $address['country_code'] = $cart->billing_address->country;
        $address['postcode'] = $cart->billing_address->postcode;
        $address['state'] = $cart->billing_address->city;
        //$address['state'] = $cart->billing_address->state;
        $address['street'] = $cart->billing_address->address1;
        $customer['address'] = $address;
        $additional_info = [];
        $purchase_summaries['currency'] = $cart->cart_currency_code;
        $purchase_summaries['payment_method_type'] = "klarna";
        $additional_info['purchase_summaries'] = $purchase_summaries;
        //$customer['additional_info'] = $additional_info;
        //$customer['business_name'] = $cart->billing_address->first_name;
        $customer['email'] = $cart->billing_address->email;
        $customer['first_name'] = $cart->billing_address->first_name;
        $customer['last_name'] = $cart->billing_address->last_name;
        //$customer['merchant_customer_id'] = "string";
        $customer['phone_number'] = $cart->billing_address->phone;
        //$data['customer'] = $customer;
        $data['merchant_order_id'] = "orderid_".$orderId;
        $metadata['order_id'] = $orderId;
        $metadata['platform'] = "nexa-merchant";
        $data['metadata'] = $metadata;
        $data['request_id'] = $orderId."_".time();
        $order = [];
        $order['products'] = [];
        $products = [];

        $cartData = $cart->toArray();

        foreach ($cartData['items'] as $item) {
          //$finalData['items'][] = $this->prepareDataForOrderItem($item);

          $product['code'] = $item['sku'];;
          $product['desc'] = $item['name'];
          $product['name'] = $item['name'];
          $product['quantity'] = $item['quantity'];
          $product['sku'] = $item['sku'];
          $product['type'] = $item['type'];
          $product['unit_price'] = $data['amount'];
          $product['url'] = config("app.url");

          $products[] = $product;

      }

        
        $order['products'] = $products;
        $shipping = [];
        $shipping['address'] = $address;
        $shipping['first_name'] = $cart->billing_address->first_name;
        $shipping['last_name'] = $cart->billing_address->last_name;
        $shipping['last_name'] = $cart->billing_address->last_name;
        $shipping['country_code'] = $cart->billing_address->country;
        //$customer['merchant_customer_id'] = "string";
        $shipping['phone_number'] = $cart->billing_address->phone;
        $order['shipping'] = $shipping;
        $order['type'] = "Online Mobile Phone Purchases";
        $data['order'] = $order;
        $data['return_url'] = route('airwallex.payment.success');
        //$data['customer_id'] = $customer_id;
        if($customer_id) {
            $data['customer_id'] = $customer_id;
            

        }else{
            $data['customer'] = [];

            $customer_address = [];
            $customer_address['city'] = $cart->billing_address->city;
            $customer_address['country_code'] = $cart->billing_address->country;
            $customer_address['postcode'] = $cart->billing_address->postcode;
            $customer_address['state'] = $cart->billing_address->city;
            $customer_address['street'] = $cart->billing_address->address1;
            $customer_data['address'] = $customer_address;
            $customer_data['email'] = $cart->billing_address->email;
            $customer_data['first_name'] = $cart->billing_address->first_name;
            $customer_data['last_name'] = $cart->billing_address->last_name;
            $customer_data['phone_number'] = $cart->billing_address->phone;

            $data['customer'] = $customer_data;
        }

        //var_dump($data);

        //var_dump($data);exit;


        


        return $data;

    }



    protected function getAddressLines($address)
    {
        $address = explode(PHP_EOL, $address, 2);

        $addressLines = [current($address)];

        if (isset($address[1])) {
            $addressLines[] = str_replace(["\r\n", "\r", "\n"], ' ', last($address));
        } else {
            $addressLines[] = '';
        }

        return $addressLines;
    }

    /**
     * Get the version number of the Ariwallex Pay package.
     *
     * @return string The version number.
     */
    public function getPluginVersion()
    {
        $manifestPath = dirname(__DIR__) . '/Resources/manifest.php';
        $manifest = include $manifestPath;
        $version = $manifest['version'];

        return $version;
    }
}
