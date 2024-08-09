<?php

use Illuminate\Support\Facades\Route;
use Webkul\Paypal\Http\Controllers\SmartButtonController;
use Webkul\Paypal\Http\Controllers\SmartButtonWebhookController;
use Webkul\Paypal\Http\Controllers\StandardController;
use Webkul\Paypal\Payment\SmartButton;

Route::group(['middleware' => ['web']], function () {
    Route::prefix('paypal/standard')->group(function () {
        Route::get('/redirect', [StandardController::class, 'redirect'])->name('paypal.standard.redirect');

        Route::get('/success', [StandardController::class, 'success'])->name('paypal.standard.success');

        Route::get('/cancel', [StandardController::class, 'cancel'])->name('paypal.standard.cancel');
    });

    Route::prefix('paypal/smart-button')->group(function () {
        Route::post('/create-order', [SmartButtonController::class, 'createOrder'])->name('paypal.smart-button.create-order');

        Route::post('/capture-order', [SmartButtonController::class, 'captureOrder'])->name('paypal.smart-button.capture-order');

        Route::post('/v1/webhooks/dispute', [SmartButtonWebhookController::class, 'dispute'])->name('paypal.smart-button.webhooks.dispute');

    });
});

Route::prefix('paypal/v2')->group(function () {
    Route::post('/checkout/orders', [SmartButtonWebhookController::class, 'checkoutOrders'])->name('paypal.smart-button.checkout.orders');
    Route::post('/checkout/orders/{order_id}/capture', [SmartButtonWebhookController::class, 'checkoutOrderscapture'])->name('paypal.smart-button.checkout.orders.capture');
});


Route::prefix('paypal/smart-button')->group(function () {
    Route::post('/v1/webhooks/dispute', [SmartButtonWebhookController::class, 'dispute'])->name('paypal.smart-button.webhooks.dispute');

});

Route::post('paypal/standard/ipn', [StandardController::class, 'ipn'])
    ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
    ->name('paypal.standard.ipn');
