<?php

namespace Webkul\Paypal\Http\Request\Paypal;

use PayPalHttp\HttpRequest;

class AuthorizeRequest extends HttpRequest
{
    public function __construct($orderId)
    {
        //parent::__construct("/v2/notifications/webhooks", "POST");

        parent::__construct("/v2/checkout/orders/{order_id}/authorize?", "POST");

        $this->path = str_replace("{order_id}", urlencode($orderId), $this->path);
        $this->headers["Content-Type"] = "application/json";
        //$this->headers["Authorization"] = "Bearer " . session("paypal_access_token");
    }
}

