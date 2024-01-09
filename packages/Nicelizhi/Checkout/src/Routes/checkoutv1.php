<?php


use Illuminate\Support\Facades\Route;
use Nicelizhi\Checkout\Http\Controllers\CheckoutV1Controller;

Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('checkout/v1/{slug}', [CheckoutV1Controller::class, 'detail'])
        ->name('checkout.v1.product.page')
        ->middleware('cacheResponse');

    Route::post('checkout/v1/downsell', [CheckoutV1Controller::class, 'downsell'])
    ->name('checkout.v1.product.downsell')
    ->middleware('cacheResponse');
    Route::get('checkout/v1/initialize', [CheckoutV1Controller::class, 'initialize'])->name('checkout.v1.product.initialize')->middleware('cacheResponse');

    Route::get('checkout/v1/success/{order_id}', [CheckoutV1Controller::class, 'success'])->name('checkout.v1.product.success')->middleware('cacheResponse');
});