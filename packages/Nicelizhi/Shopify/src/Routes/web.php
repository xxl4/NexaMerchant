<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Shopify\Http\Controllers\ProductController;
use Nicelizhi\Shopify\Http\Controllers\WebhooksController;


/**
 * Catalog routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::prefix('shopify')->group(function () {
        /**
         * Products routes.
         */
        Route::controller(ProductController::class)->prefix('products')->group(function () {
            Route::get('', 'index')->name('shopify.products.index');

            // Route::get('create', 'create')->name('admin.catalog.products.create');

            // Route::post('create', 'store')->name('admin.catalog.products.store');

            // Route::get('copy/{id}', 'copy')->name('admin.catalog.products.copy');

            // Route::get('edit/{id}', 'edit')->name('admin.catalog.products.edit');

            // Route::put('edit/{id}', 'update')->name('admin.catalog.products.update');

            // Route::delete('edit/{id}', 'destroy')->name('admin.catalog.products.delete');

            // Route::put('edit/{id}/inventories', 'updateInventories')->name('admin.catalog.products.update_inventories');

            // Route::post('upload-file/{id}', 'uploadLink')->name('admin.catalog.products.upload_link');

            // Route::post('upload-sample/{id}', 'uploadSample')->name('admin.catalog.products.upload_sample');

            // Route::post('mass-action', 'massUpdate')->name('admin.catalog.products.mass_action');

            // Route::post('mass-update', 'massUpdate')->name('admin.catalog.products.mass_update');
            
            // Route::post('mass-delete', 'massDestroy')->name('admin.catalog.products.mass_delete');

            // Route::get('search', 'search')->name('admin.catalog.products.search');

            // Route::get('{id}/{attribute_id}', 'download')->defaults('_config', [
            //     'view' => 'admin.catalog.products.edit',
            // ])->name('admin.catalog.products.file.download');
        });
    });
});


