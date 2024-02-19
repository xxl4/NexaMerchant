<?php
return [
    'countries' => env('ONEBUY_COUNTRIES'),
    'default_country' => env('ONEBUY_DEFAULT_COUNTRY'),
    'airwallex' => [
            'method' => [
                'card',
                'googlepay',
                'applepay',
            ]
    ],
    'payments_default' => env('ONEBUY_PAYMENT_DEFAULT','payment_method_airwallex'),
    'payments' => [
        'airwallex_klarna' => env('ONEBUY_PAYMENT_AIRWALLEX_KLARNA', 1),
        'payal_standard' => env('ONEBUY_PAYMNET_PAYAL_STANDARD', 1),
        'airwallex_credit_card' => env('ONEBUY_PAYMENT_AIRWALLEX_CREDIT_CARD', 1)
    ]
];