<?php
return [
    'shopify_app_host_name' => env('SHOPIFY_APP_HOST_NAME', "https://wmshoe.myshopify.com"),
    'shopify_admin_access_token'  => env('SHOPIFY_ADMIN_ACCESS_TOKEN'),
    'shopify_client_id'  => env('SHOPIFY_CLIENT_ID'),
    'shopify_client_secret'  => env('SHOPIFY_CLIENT_SECRET'),
    'shopify_store_id' => env('SHOPIFY_APP_ID'),
    'store_lang' => env('SHOPIFY_STORE_LANG'),
    'wcom_noticle_url' => env('WCOME_NOTICLE_URL'),
    'feishu_noticle_url' => env('FEISU_NOTICLE_URL'),
    'order_pre' => env('SHOPIFY_ORDER_PRE'),
    'enable' => env('SHOPIFY_ENABLE', true)
];