<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Catalog\CategoryController;
use Webkul\Admin\Http\Controllers\Catalog\AttributeFamilyController;
use Webkul\Admin\Http\Controllers\Catalog\AttributeController;
use Webkul\Admin\Http\Controllers\Catalog\ProductController;

/**
 * Catalog routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.manage_url')], function () {
    Route::prefix('catalog')->group(function () {
        /**
         * Attributes routes.
         */
        Route::controller(AttributeController::class)->prefix('attributes')->group(function () {
            Route::get('', 'index')->name('manage.catalog.attributes.index');

            Route::get('{id}/options', 'getAttributeOptions')->name('manage.catalog.attributes.options');

            Route::get('create', 'create')->name('manage.catalog.attributes.create');

            Route::post('create', 'store')->name('manage.catalog.attributes.store');

            Route::get('edit/{id}', 'edit')->name('manage.catalog.attributes.edit');

            Route::put('edit/{id}', 'update')->name('manage.catalog.attributes.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.catalog.attributes.delete');

            Route::post('mass-delete', 'massDestroy')->name('manage.catalog.attributes.mass_delete');

        });

        /**
         * Attribute families routes.
         */
        Route::controller(AttributeFamilyController::class)->prefix('families')->group(function () {
            Route::get('', 'index')->name('manage.catalog.families.index');

            Route::get('create', 'create')->name('manage.catalog.families.create');

            Route::post('create', 'store')->name('manage.catalog.families.store');

            Route::get('edit/{id}', 'edit')->name('manage.catalog.families.edit');

            Route::put('edit/{id}', 'update')->name('manage.catalog.families.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.catalog.families.delete');
        });

        /**
         * Categories routes.
         */
        Route::controller(CategoryController::class)->prefix('categories')->group(function () {
            Route::get('', 'index')->name('manage.catalog.categories.index');

            Route::get('create', 'create')->name('manage.catalog.categories.create');

            Route::post('create', 'store')->name('manage.catalog.categories.store');

            Route::get('edit/{id}', 'edit')->name('manage.catalog.categories.edit');

            Route::put('edit/{id}', 'update')->name('manage.catalog.categories.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.catalog.categories.delete');

            Route::get('products/{id}', 'products')->name('manage.catalog.categories.products');

            Route::post('mass-delete', 'massDestroy')->name('manage.catalog.categories.mass_delete');

            Route::post('mass-update', 'massUpdate')->name('manage.catalog.categories.mass_update');

            Route::get('search', 'search')->name('manage.catalog.categories.search');
            
            Route::get('tree', 'tree')->name('manage.catalog.categories.tree');
        });

        /**
         * Sync route.
         */
        Route::get('/sync', [ProductController::class, 'sync']);

        /**
         * Products routes.
         */
        Route::controller(ProductController::class)->prefix('products')->group(function () {
            Route::get('', 'index')->name('manage.catalog.products.index');

            Route::get('create', 'create')->name('manage.catalog.products.create');

            Route::post('create', 'store')->name('manage.catalog.products.store');

            Route::get('copy/{id}', 'copy')->name('manage.catalog.products.copy');

            Route::get('edit/{id}', 'edit')->name('manage.catalog.products.edit');

            Route::put('edit/{id}', 'update')->name('manage.catalog.products.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.catalog.products.delete');

            Route::put('edit/{id}/inventories', 'updateInventories')->name('manage.catalog.products.update_inventories');

            Route::post('upload-file/{id}', 'uploadLink')->name('manage.catalog.products.upload_link');

            Route::post('upload-sample/{id}', 'uploadSample')->name('manage.catalog.products.upload_sample');

            Route::post('mass-action', 'massUpdate')->name('manage.catalog.products.mass_action');

            Route::post('mass-update', 'massUpdate')->name('manage.catalog.products.mass_update');
            
            Route::post('mass-delete', 'massDestroy')->name('manage.catalog.products.mass_delete');

            Route::get('search', 'search')->name('manage.catalog.products.search');

            Route::get('{id}/{attribute_id}', 'download')->defaults('_config', [
                'view' => 'manage.catalog.products.edit',
            ])->name('manage.catalog.products.file.download');
        });
    });
});
