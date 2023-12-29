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
    public function createPaymentOrder($cart, $orderId) {

      $sdk = new AirwallexSdk($this->paymentConfig, $this->productionMode);

      $buildRequestBody = $this->buildCreateOrderData($cart, $orderId);
      //var_dump($buildRequestBody);
      $transactionManager = $sdk->CreatePayment(json_encode($buildRequestBody, JSON_OBJECT_AS_ARRAY | JSON_UNESCAPED_UNICODE));

      // 针对生成订单后，需要和订单关联起来，从而在回告的过程中，好识别

      //var_dump($transactionManager);

      return $transactionManager;
    }

    /**
     * 
     * @link https://www.airwallex.com/docs/api#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents_create/post
     * build data for post
     * 
     * 
     */
    public function buildCreateOrderData($cart, $orderId) {
        //$cart = Cart::getCart();

        $data = [];
        $amount = (float) $cart->sub_total + $cart->tax_total + ($cart->selected_shipping_rate ? $cart->selected_shipping_rate->price : 0) - $cart->discount_amount;
        $data['amount'] = round($amount, 2, PHP_ROUND_HALF_UP);
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
        $data['customer'] = $customer;
        $data['merchant_order_id'] = "orderid_".$orderId;
        $metadata['my_test_metadata_id'] = "my_test_metadata_id_".$orderId;
        $data['metadata'] = $metadata;
        $data['request_id'] = $orderId."_".time();
        $order = [];
        $order['products'] = [];
        $products = [];
        $product['code'] = "11111";
        $product['desc'] = "11111";
        $product['name'] = "11111";
        $product['quantity'] = 1;
        $product['sku'] = "11111";
        $product['type'] = "11111";
        $product['unit_price'] = 14.99;
        $product['url'] = "https://www.baidu.com/";

        $products[] = $product;
        $order['products'] = $products;
        $shipping = [];
        $shipping['address'] = $address;
        $shipping['first_name'] = $cart->billing_address->first_name;
        $shipping['last_name'] = $cart->billing_address->last_name;
        //$customer['merchant_customer_id'] = "string";
        $shipping['phone_number'] = $cart->billing_address->phone;
        $order['shipping'] = $shipping;
        $order['type'] = "Online Mobile Phone Purchases";
        $data['order'] = $order;
        $data['return_url'] = "https://shop.hatmeo.com/";
        return $data;

        $data = '"amount": '.',
        "currency": "'.$cart->shipping_address->country.'",
        "customer": {
          "additional_info": {
            "first_successful_order_date": "2019-09-18",
            "last_modified_at": "2019-09-18T12:30:00Z",
            "registered_via_social_media": false,
            "registration_date": "2019-09-18"
          },
          "address": {
            "city": "'.$cart->billing_address->city.'",
            "country_code": "'.$cart->billing_address->country.'",
            "postcode": "'.$cart->billing_address->postcode.'",
            "state": "'.$cart->billing_address->state.'",
            "street": "'.$cart->billing_address->address1.'"
          },
          "business_name": "'.$cart->billing_address->first_name.'",
          "email": "'.$cart->billing_address->email.'",
          "first_name": "'.$cart->billing_address->first_name.'",
          "last_name": "'.$cart->billing_address->last_name.'",
          "merchant_customer_id": "string",
          "phone_number": "'.$cart->billing_address->phone.'"
        },
        "customer_id": "cus_ps8e0ZgQzd2QnCxVpzJrHD6KOVu",
        "descriptor": "Airwallex - T-shirt",
        "merchant_order_id": "cc9bfc13-ba30-483b-a62c-ee925fc9bfea",
        "metadata": {
          "id": 1
        },
        "order": {
          "products": [
            {
              "code": "3414314111",
              "desc": "IPHONE 7",
              "effective_end_at": "2020-12-31T23:59:59Z",
              "effective_start_at": "2020-01-01T00:00:00Z",
              "name": "IPHONE7",
              "quantity": 5,
              "seller": {
                "identifier": "string",
                "name": "string"
              },
              "sku": "100004",
              "type": "physical",
              "unit_price": 100.01,
              "url": "http://airwallex/product/23213"
            }
          ],
          "sellers": [
            {
              "additional_info": {
                "address_updated_at": "2023-01-01T00:00:00",
                "email_updated_at": "2023-01-01T00:00:00Z",
                "password_updated_at": "2023-01-01T00:00:00Z",
                "products_updated_at": "2023-01-01T00:00:00Z",
                "sales_summary": {
                  "currency": "string",
                  "period": "string",
                  "sales_amount": 0,
                  "sales_count": 0
                }
              },
              "business_info": {
                "email": "john.doe@airwallex.com",
                "phone_number": "13800000000",
                "postcode": "10000",
                "rating": 4.5,
                "registration_date": "2019-09-18"
              },
              "identifier": "string",
              "name": "string"
            }
          ],
          "shipping": {
            "address": {
              "city": "Shanghai",
              "country_code": "CN",
              "postcode": "100000",
              "state": "Shanghai",
              "street": "Pudong District"
            },
            "first_name": "John",
            "last_name": "Doe",
            "phone_number": "13800000000",
            "shipping_method": "sameday"
          },
          "supplier": {
            "address": {
              "city": "Shanghai",
              "country_code": "CN",
              "postcode": "100000",
              "state": "Shanghai",
              "street": "Pudong District"
            },
            "business_name": "Abc Trading Limited",
            "email": "john.doe@airwallex.com",
            "first_name": "John",
            "last_name": "Doe",
            "phone_number": "13800000000"
          },
          "type": "physical_goods"
        },
        "payment_method_options": {
          "card": {
            "risk_control": {
              "skip_risk_processing": false,
              "three_domain_secure_action": "FORCE_3DS",
              "three_ds_action": "FORCE_3DS"
            },
            "three_ds_action": "FORCE_3DS"
          }
        },
        "request_id": "ee939540-3203-4a2c-9172-89a566485dd9",
        "return_url": "https://shop.hatmeo.com",
        "risk_control_options": {
          "skip_risk_processing": false,
          "tra_applicable": false
        }';

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
