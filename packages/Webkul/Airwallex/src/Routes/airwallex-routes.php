<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Airwallex\Controllers\AirwallexController;
use Nicelizhi\Airwallex\Controllers\OnePageController;

/**
 * Routes for Bagisto airwallex integration.
 *
 * @middleware web, locale, theme, currency
 */

 Route::group(['middleware' => ['web','locale', 'theme', 'currency']], function () {
    Route::prefix('airwallex')->group(function () {
        Route::get('payment-methods', [AirwallexController::class, 'showPaymentMethods'])->name('airwallex.payment_methods');
    });
});
