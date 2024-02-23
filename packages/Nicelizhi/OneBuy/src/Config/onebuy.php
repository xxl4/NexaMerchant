<?php
return [
    'countries' => env('ONEBUY_COUNTRIES'),
    'lang' => env('ONEBUY_DEFAULT_LANG'),
    'default_country' => env('ONEBUY_DEFAULT_COUNTRY'),
    'brand' => env('ONEBUY_BRAND', 'Hatme'),
    'airwallex' => [
            'method' => [
                'card',
                'googlepay',
                'applepay',
            ]
    ],
    'payments_default' => env('ONEBUY_PAYMENT_DEFAULT','payment_method_airwallex'),
    'payments' => [
        'airwallex_klarna' => env('ONEBUY_PAYMENT_AIRWALLEX_KLARNA', 0),
        'payal_standard' => env('ONEBUY_PAYMNET_PAYAL_STANDARD', 0),
        'airwallex_credit_card' => env('ONEBUY_PAYMENT_AIRWALLEX_CREDIT_CARD', 0),
        'airwallex_dropin' => env('ONEBUY_PAYMENT_AIRWALLEX_DROPIN', 0)
    ]
];