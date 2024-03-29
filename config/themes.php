<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Shop Theme Configuration
    |--------------------------------------------------------------------------
    |
    | All the configurations are related to the shop themes.
    |
    */

    'default' => 'default',

    'themes' => [
        'default' => [
            'name'        => 'Default',
            'assets_path' => 'public/themes/shop/default',
            'views_path'  => 'resources/themes/default/views',

            'vite'        => [
                'hot_file'                 => 'shop-default-vite.hot',
                'build_directory'          => 'themes/shop/default/build',
                'package_assets_directory' => 'src/Resources/assets',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Theme Configuration
    |--------------------------------------------------------------------------
    |
    | All the configurations are related to the admin themes.
    |
    */

    'admin-default' => 'default',

    'admin-themes' => [
        'default' => [
            'name'        => 'Default',
            'assets_path' => 'public/themes/admin/default',
            'views_path'  => 'resources/admin-themes/default/views',

            'vite'        => [
                'hot_file'                 => 'admin-default-vite.hot',
                'build_directory'          => 'themes/admin/default/build',
                'package_assets_directory' => 'src/Resources/assets',
            ],
        ],
    ],

    'manage-default' => 'default',
    'manage-themes' => [
        'default' => [
            'name'        => 'Default',
            'assets_path' => 'public/themes/manage/default',
            'views_path'  => 'resources/manage-themes/default/views',

            'vite'        => [
                'hot_file'                 => 'manage-default-vite.hot',
                'build_directory'          => 'themes/manage/default/build',
                'package_assets_directory' => 'src/Resources/assets',
            ],
        ],
    ],
];
