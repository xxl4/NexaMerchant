<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Nicelizhi\Shopify\Models\ShopifyProduct;
//use Nicelizhi\Shopify\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhooksController extends Controller
{

    public function __construct()
    {
        
    }

    public function v1(Request $request) {
        # The Shopify app's client secret, viewable from the Partner Dashboard. In a production environment, set the client secret as an environment variable to prevent exposing it in code.
        Log::info("webhook ".json_encode($request->all()));
        


        $hmac_header = @$_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
        $data = file_get_contents('php://input');

        Log::info("webhook ".json_encode($data));

        // $verified = $this->verify_webhook($data, $hmac_header);
        // //error_log('Webhook verified: '.var_export($verified, true)); // Check error.log to see the result
        // Log::error('Webhook verified: '.var_export($verified, true));
        // if ($verified) {
        // # Process webhook payload
        // # ...
        // } else {
        //     //http_response_code(401);
        //     abort(401);
        // }
        
    }

    function verify_webhook($data, $hmac_header)
    {
        define('CLIENT_SECRET', 'ace668f696aa6437e4c93d772c2284f1');
        $calculated_hmac = base64_encode(hash_hmac('sha256', $data, CLIENT_SECRET, true));
        return hash_equals($calculated_hmac, $hmac_header);
    }

}