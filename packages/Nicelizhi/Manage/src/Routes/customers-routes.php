<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\Customers\AddressController;
use Nicelizhi\Manage\Http\Controllers\Customers\CustomerController;
use Nicelizhi\Manage\Http\Controllers\Customers\CustomerGroupController;
use Nicelizhi\Manage\Http\Controllers\Customers\ReviewController;

/**
 * Customers routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.manage_url') . '/customers'], function () {
    Route::prefix('customers')->group(function () {
        /**
         * Customer management routes.
         */
        Route::controller(CustomerController::class)->group(function () {
            Route::get('', 'index')->name('manage.customers.customers.index');

            Route::get('view/{id}', 'show')->name('manage.customers.customers.view');

            Route::post('create', 'store')->name('manage.customers.customers.store');

            Route::get('edit/{id}', 'edit')->name('manage.customers.customers.edit');

            Route::get('search', 'search')->name('manage.customers.customers.search');

            Route::get('login-as-customer/{id}', 'login_as_customer')->name('manage.customers.customers.login_as_customer');

            Route::post('note/{id}', 'storeNotes')->name('manage.customer.note.store');

            Route::put('edit/{id}', 'update')->name('manage.customers.customers.update');

            Route::post('mass-delete', 'massDestroy')->name('manage.customers.customers.mass_delete');

            Route::post('mass-update', 'massUpdate')->name('manage.customers.customers.mass_update');

            Route::post('/{id}', 'destroy')->name('manage.customers.customers.delete');

            Route::get('{id}/orders', 'orders')->name('manage.customers.customers.orders.data');
        });

        /**
         * Customer's addresses routes.
         */
        Route::controller(AddressController::class)->group(function () {
            Route::prefix('{id}/addresses')->group(function () {
                Route::get('', 'index')->name('manage.customers.customers.addresses.index');

                Route::get('create', 'create')->name('manage.customers.customers.addresses.create');

                Route::post('create', 'store')->name('manage.customers.customers.addresses.store');
            });

            Route::prefix('addresses')->group(function () {
                Route::get('edit/{id}', 'edit')->name('manage.customers.customers.addresses.edit');

                Route::put('edit/{id}', 'update')->name('manage.customers.customers.addresses.update');

                Route::post('default/{id}', 'makeDefault')->name('manage.customers.customers.addresses.set_default');

                Route::post('delete/{id}', 'destroy')->name('manage.customers.customers.addresses.delete');
            });
        });
    });

    /**
     * Customer's reviews routes.
     */
    Route::controller(ReviewController::class)->prefix('reviews')->group(function () {
        Route::get('', 'index')->name('manage.customers.customers.review.index');

        Route::get('edit/{id}', 'edit')->name('manage.customers.customers.review.edit');

        Route::put('edit/{id}', 'update')->name('manage.customers.customers.review.update');

        Route::delete('/{id}', 'destroy')->name('manage.customers.customers.review.delete');

        Route::post('mass-delete', 'massDestroy')->name('manage.customers.customers.review.mass_delete');

        Route::post('mass-update', 'massUpdate')->name('manage.customers.customers.review.mass_update');
    });

    /**
     * Customer groups routes.
     */
    Route::controller(CustomerGroupController::class)->prefix('groups')->group(function () {
        Route::get('', 'index')->name('manage.customers.groups.index');

        Route::post('create', 'store')->name('manage.customers.groups.store');

        Route::put('edit', 'update')->name('manage.customers.groups.update');

        Route::delete('delete/{id}', 'destroy')->name('manage.customers.groups.delete');
    });
});
