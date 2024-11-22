<?php

namespace Webkul\Paypal\Http\Request\Paypal;

use PayPalHttp\HttpRequest;
use PayPalCheckoutSdk\Core\PayPalEnvironment;

class CapturesGetRequest extends HttpRequest
{
    public function __construct($captureId)
    {
        parent::__construct("/v2/payments/captures/{$captureId}", "GET");
        $this->headers["Content-Type"] = "application/json";
    }
}
