<?php

namespace Webkul\Paypal\Http\Request\Paypal;

use PayPalHttp\HttpRequest;

class CreateWebookRequest extends HttpRequest
{
    public function __construct()
    {
        parent::__construct("/v2/notifications/webhooks", "POST");
        $this->headers["Content-Type"] = "application/json";
    }
}

