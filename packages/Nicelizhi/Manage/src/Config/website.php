<?php
return [
    'lists' => [
        'us' => [
            'name' => 'United States',
            'link' => env('SYNC_US'),
        ],
        'gb' => [
            'name' => 'United Kingdom',
            'link' => env('SYNC_GB'),
        ],
        'de' => [
            'name' => 'Germany',
            'link' => env('SYNC_DE'),
        ],
        'es' => [
            'name' => 'Spain',
            'link' => env('SYNC_ES'),
        ],
        'fr' => [
            'name' => 'France',
            'link' => env('SYNC_FR'),
        ],
    ],
    'paypal' => [
        'v1' => [
            'client_id' => env('PAYPAL_CLIENT_ID_V1'),
            'client_secret' => env('PAYPAL_CLIENT_SECRET_V1'),
            'mode' => env('PAYPAL_MODE_V1'),
        ],
    ],
];