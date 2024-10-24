<?php
return [
    'countries' => env('ONEBUY_COUNTRIES'),
    'lang' => env('ONEBUY_DEFAULT_LANG'),
    'default_country' => env('ONEBUY_DEFAULT_COUNTRY'),
    'brand' => env('ONEBUY_BRAND', 'Hatme'),
    'gtag' => env('ONEBUY_GTAG', ""),
    'gtm' => env('ONEBUY_GTM', ""),
    'fb_ids' => env('FB_IDS'),
    'ob_adv_id' => env('OB_ADV_ID'),
    'quora_adv_id' => env('QUORA_ID'),
    'crm_channel' => env('CRM_CHANNEL'),
    'crm_url' => env('CRM_URL',''),
    'paypal_rt' => env('ONEBUY_PAYPAL_RT'),
    'airwallex' => [
            'method' => [
                'card',
                'googlepay',
                'applepay',
            ]
    ],
    'payments_default' => env('ONEBUY_PAYMENT_DEFAULT','payment_method_airwallex'),
    'judge' => [
        'shop_domain' => env('JUDGE_SHOP_DOMAIN'),
        'api_token' => env('JUDGE_API_TOKEN'),
    ],
    'payments' => [
        'airwallex_klarna' => env('ONEBUY_PAYMENT_AIRWALLEX_KLARNA', 0),
        'payal_standard' => env('ONEBUY_PAYMNET_PAYAL_STANDARD', 0),
        'airwallex_credit_card' => env('ONEBUY_PAYMENT_AIRWALLEX_CREDIT_CARD', 0),
        'airwallex_dropin' => env('ONEBUY_PAYMENT_AIRWALLEX_DROPIN', 0),
        'airwallex_google'  => env('ONEBUY_PAYMENT_AIRWALLEX_GOOGLE', 0),
        'airwallex_appley'  => env('ONEBUY_PAYMENT_AIRWALLEX_APPLE', 0),
    ],
    'return_shipping_insurance' => [
        'product_id' => env('ONEBUY_RETURN_SHIPPING_INSURANCE_PRODUCT_ID', 0),
        'product_sku' => env('ONEBUY_RETURN_SHIPPING_INSURANCE_PRODUCT_SKU', ''),
    ]
];