<?php

namespace Webkul\Paypal\Payment;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Payments\CapturesRefundRequest;
use PayPalCheckoutSdk\Core\AccessTokenRequest;
use Webkul\Paypal\Http\Request\Paypal\WebhooksListRequest;
use Webkul\Paypal\Http\Request\Paypal\CreateWebookRequest;
use Webkul\Paypal\Http\Request\Paypal\AuthIDTokenRequest;
use Illuminate\Support\Facades\Log;
use Webkul\Paypal\Http\Request\Paypal\AuthorizeRequest;

class SmartButton extends Paypal
{
    /**
     * Client ID.
     *
     * @var string
     */
    protected $clientId;

    /**
     * Client secret.
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * Payment method code.
     *
     * @var string
     */
    protected $code  = 'paypal_smart_button';

    /**
     * Paypal partner attribution id.
     *
     * @var string
     */
    protected $paypalPartnerAttributionId = 'NexaMerchant_Cart';

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     *
     * @return PayPalCheckoutSdk\Core\PayPalHttpClient
     */
    public function client()
    {
        return new PayPalHttpClient($this->environment());
    }


    /**
     * Create order for approval of client.
     *
     * @param  array  $body
     * @return HttpResponse
     */
    public function createOrder($body)
    {
        $request = new OrdersCreateRequest;
        //$request->headers['PayPal-Partner-Attribution-Id'] = $this->paypalPartnerAttributionId;
        $request->headers['PayPal-Request-Id'] = time();
        //$request->prefer('return=representation');
        $request->body = $body;

        Log::info("create order request ". json_encode($request));

        $result = $this->client()->execute($request);

        Log::info("create order result ". json_encode($result));

        return $result;
    }

    /**
     * Capture order after approval.
     *
     * @param  string  $orderId
     * @return HttpResponse
     */
    public function captureOrder($orderId)
    {
        $request = new OrdersCaptureRequest($orderId);

        $request->headers['PayPal-Partner-Attribution-Id'] = $this->paypalPartnerAttributionId;
        $request->prefer('return=representation');

        $result = $this->client()->execute($request);
        Log::info("capture order ". json_encode($result));
    }

    /**
     * Get order details.
     *
     * @param  string  $orderId
     * @return HttpResponse
     */
    public function getOrder($orderId)
    {   
        try {
            $result = $this->client()->execute(new OrdersGetRequest($orderId));
            return $result;
        }catch (\Exception $e) {
            var_dump($e->getMessage());
            //exit;
        }finally {
            //echo "Error";exit;
        }
        return false;
    }

    /**
     * Get capture id.
     *
     * @param  string  $orderId
     * @return string
     */
    public function getCaptureId($orderId)
    {
        $paypalOrderDetails = $this->getOrder($orderId);

        return $paypalOrderDetails->result->purchase_units[0]->payments->captures[0]->id;
    }

    /**
     * Refund order.
     *
     * @return HttpResponse
     */
    public function refundOrder($captureId, $body = [])
    {
        $request = new CapturesRefundRequest($captureId);

        $request->headers['PayPal-Partner-Attribution-Id'] = $this->paypalPartnerAttributionId;
        $request->body = $body;

        Log::info("payment refund" . json_encode($request));
        
        return $this->client()->execute($request);
    }

    /**
     * 
     * authorize orders
     * 
     */
    public function AuthorizeOrder($captureId) {
        $request = new AuthorizeRequest($captureId);

        $request->headers['PayPal-Partner-Attribution-Id'] = $this->paypalPartnerAttributionId;
        //$request->body = $body;

        Log::info("AuthorizeOrder " . json_encode($request));
        
        $result = $this->client()->execute($request);

        Log::info("AuthorizeOrder result " . json_encode($result));

        return $result;

    }

   
    

    /**
     * Return paypal access token
     *
     * @return string
     */
    public function getAccessToken(){
        $request = new AccessTokenRequest($this->environment());
        $request->headers['PayPal-Partner-Attribution-Id'] = $this->paypalPartnerAttributionId;

        return $this->client()->execute($request);
    }


    public function getIDAccessToken(){
        $request = new AuthIDTokenRequest($this->environment());
        $request->headers['PayPal-Partner-Attribution-Id'] = $this->paypalPartnerAttributionId;

        return $this->client()->execute($request);
    }

    /**
     * Return paypal webhook list
     * 
     * @return string
     */
    public function WebhookList() {
        try {
            $result = $this->client()->execute(new WebhooksListRequest());
        }catch (\Exception $e) {
            var_dump($e->getMessage());
            //exit;
        }finally {
            //echo "Error";exit;
        }
        return $result;
    }

    /**
     * Create a Webhook
     * 
     * @return string
     */
    public function CreateWebook($body) {
        try {
            $request = new CreateWebookRequest();
            $request->body = $body;
            $result = $this->client()->execute($request);
            return $result;
        }catch (\Exception $e) {
            var_dump($e->getMessage());
            //exit;
        }finally {
            //echo "Error";exit;
        }
        return false;
    }

    /**
     * Return paypal redirect url
     *
     * @return string
     */
    public function getRedirectUrl()
    {
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     *
     * @return PayPalCheckoutSdk\Core\SandboxEnvironment|PayPalCheckoutSdk\Core\ProductionEnvironment
     */
    protected function environment()
    {
        $isSandbox = $this->getConfigData('sandbox') ?: false;

        if ($isSandbox) {
            return new SandboxEnvironment($this->clientId, $this->clientSecret);
        }

        return new ProductionEnvironment($this->clientId, $this->clientSecret);
    }

    /**
     * Initialize properties.
     *
     * @return void
     */
    protected function initialize()
    {
        $this->clientId = $this->getConfigData('client_id') ?: '';

        $this->clientSecret = $this->getConfigData('client_secret') ?: '';
    }

    /**
     * 
     * Set ClientID
     * @return void
     */
    public function setClientId($clientId) {
        $this->clientId = $clientId;
    }

    /**
     * 
     * Set ClientSecret
     * @return void
     */
    public function setClientSecret($clientSecret) {
        $this->clientSecret = $clientSecret;
    }
}