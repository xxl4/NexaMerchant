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
];