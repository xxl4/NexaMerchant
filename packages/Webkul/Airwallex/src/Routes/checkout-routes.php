<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Airwallex\Controllers\OnePageController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    /**
     * Checkout routes.
     */

     Route::controller(OnepageController::class)->prefix('checkout/order/onepage')->group(function () {
        Route::post('save-airwallex-gateway', 'storeInSession')->name('shop.checkout.onepage.airwallex');
        Route::get('success', 'success')->name('airwallex.shop.checkout.onepage.success');

        

    });
});