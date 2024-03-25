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

    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_updated(Request $request) {
        Log::info("orders_updated ".json_encode($request->all()));
    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_create(Request $request) {
        Log::info("orders_create ".json_encode($request->all()));
    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_fulfilled(Request $request) {
        Log::info("orders_fulfilled ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_edited(Request $request) {
        Log::info("orders_edited ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function orders_paid(Request $request) {
        Log::info("orders_paid ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function order_transactions_create(Request $request) {
        Log::info("order_transactions_create ".json_encode($request->all()));
    }

     /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function customers_create(Request $request) {
        Log::info("customers_create ".json_encode($request->all()));
    }

    /**
     * 
     * @link https://shopify.dev/docs/api/admin-rest/2023-10/resources/webhook#event-topics
     * 
     */
    public function customers_update(Request $request) {
        Log::info("customers_update ".json_encode($request->all()));
    }

    public function fulfillments_create(Request $request) {
        Log::info("fulfillments_create ".json_encode($request->all()));
    }

    public function fulfillments_update(Request $request) {
        Log::info("fulfillments_update ".json_encode($request->all()));
    }

    public function products_create(Request $request) {
        Log::info("products_create ".json_encode($request->all()));
    }

    public function products_delete(Request $request) {
        Log::info("products_delete ".json_encode($request->all()));
    }

    public function products_update(Request $request) {
        Log::info("products_update ".json_encode($request->all()));
    }



    function verify_webhook($data, $hmac_header)
    {
        define('CLIENT_SECRET', 'ace668f696aa6437e4c93d772c2284f1');
        $calculated_hmac = base64_encode(hash_hmac('sha256', $data, CLIENT_SECRET, true));
        return hash_equals($calculated_hmac, $hmac_header);
    }

}