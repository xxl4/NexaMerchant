<?php

namespace Webkul\Paypal\Http\Request\Paypal;

use PayPalHttp\HttpRequest;

class WebhooksListRequest extends HttpRequest
{
    public function __construct()
    {
        parent::__construct("/v1/notifications/webhooks", "GET");
        $this->headers["Content-Type"] = "application/json";
    }
}

