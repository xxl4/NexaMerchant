<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\Reporting\CustomerController;
use Nicelizhi\Manage\Http\Controllers\Reporting\ProductController;
use Nicelizhi\Manage\Http\Controllers\Reporting\SaleController;

/**
 * Reporting routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.manage_url')], function () {
    Route::prefix('reporting')->group(function () {
        /**
         * CUstomer routes.
         */
        Route::controller(CustomerController::class)->prefix('customers')->group(function () {
            Route::get('', 'index')->name('manage.reporting.customers.index');

            Route::get('stats', 'stats')->name('manage.reporting.customers.stats');
            
            Route::get('export', 'export')->name('manage.reporting.customers.export');

            Route::get('view', 'view')->name('manage.reporting.customers.view');

            Route::get('view/stats', 'viewStats')->name('manage.reporting.customers.view.stats');
        });

        /**
         * Product routes.
         */
        Route::controller(ProductController::class)->prefix('products')->group(function () {
            Route::get('', 'index')->name('manage.reporting.products.index');

            Route::get('stats', 'stats')->name('manage.reporting.products.stats');
            
            Route::get('export', 'export')->name('manage.reporting.products.export');

            Route::get('view', 'view')->name('manage.reporting.products.view');

            Route::get('view/stats', 'viewStats')->name('manage.reporting.products.view.stats');
        });

        /**
         * Sale routes.
         */
        Route::controller(SaleController::class)->prefix('sales')->group(function () {
            Route::get('', 'index')->name('manage.reporting.sales.index');

            Route::get('stats', 'stats')->name('manage.reporting.sales.stats');
            
            Route::get('export', 'export')->name('manage.reporting.sales.export');

            Route::get('view', 'view')->name('manage.reporting.sales.view');

            Route::get('view/stats', 'viewStats')->name('manage.reporting.sales.view.stats');
        });
    });
});