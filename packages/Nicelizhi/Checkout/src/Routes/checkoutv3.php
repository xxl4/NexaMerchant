<?php


use Illuminate\Support\Facades\Route;
use Nicelizhi\Checkout\Http\Controllers\CheckoutV3Controller;

Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('checkout/v3/{slug}', [CheckoutV3Controller::class, 'detail'])
        ->name('checkout.v3.product.page')
        ->middleware('cacheResponse');

    Route::post('checkout/v3/downsell', [CheckoutV3Controller::class, 'downsell'])
    ->name('checkout.v3.product.downsell')
    ->middleware('cacheResponse');
    Route::get('checkout/v3/initialize', [CheckoutV3Controller::class, 'initialize'])->name('checkout.v3.product.initialize')->middleware('cacheResponse');

    Route::get('checkout/v3/success/{order_id}', [CheckoutV3Controller::class, 'success'])->name('checkout.v3.product.success')->middleware('cacheResponse');

    Route::get('checkout/v3/cms/{slug}', [CheckoutV3Controller::class, 'cms'])->name('checkout.v3.product.cms')->middleware('cacheResponse'); // 添加 cms 数据内容
    Route::post('checkout/v3/set-ga-client-id', [CheckoutV3Controller::class, 'setGaClientId'])->name('checkot.v3.product.setclientId')->middleware('cacheResponse');
});