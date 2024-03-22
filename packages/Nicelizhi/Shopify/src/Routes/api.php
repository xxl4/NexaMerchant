<?php

use Illuminate\Support\Facades\Route;

use Nicelizhi\Shopify\Http\Controllers\WebhooksController;

Route::prefix('shopify')->group(function () {

    Route::controller(WebhooksController::class)->prefix('webhooks')->group(function () {
        Route::post('v1', 'v1')->name('shopify.webhook.v1');
    });

});