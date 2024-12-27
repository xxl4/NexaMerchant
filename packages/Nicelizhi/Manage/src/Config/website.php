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
        'ro' => [
            'name' => 'Romania',
            'link' => env('SYNC_RO'),
        ],
        'cz' => [
            'name' => 'Czech Republic',
            'link' => env('SYNC_CZ'),
        ],
        'sk' => [
            'name' => 'Slovakia',
            'link' => env('SYNC_SK'),
        ],
        'hu' => [
            'name' => 'Hungary',
            'link' => env('SYNC_HU'),
        ],
        'pl' => [
            'name' => 'Poland',
            'link' => env('SYNC_PL'),
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