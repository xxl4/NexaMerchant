<?php


use Illuminate\Support\Facades\Route;
use Nicelizhi\Checkout\Http\Controllers\CheckoutV2Controller;

Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('checkout/v2/{slug}', [CheckoutV2Controller::class, 'detail'])
        ->name('checkout.v2.product.page')
        ->middleware('cacheResponse');

    Route::post('checkout/v2/downsell', [CheckoutV2Controller::class, 'downsell'])
    ->name('checkout.v2.product.downsell')
    ->middleware('cacheResponse');
    Route::get('checkout/v2/initialize', [CheckoutV2Controller::class, 'initialize'])->name('checkout.v2.product.initialize')->middleware('cacheResponse');

    Route::get('checkout/v2/success/{order_id}', [CheckoutV2Controller::class, 'success'])->name('checkout.v2.product.success')->middleware('cacheResponse');

    Route::get('checkout/v2/cms/{slug}', [CheckoutV2Controller::class, 'cms'])->name('checkout.v2.product.cms')->middleware('cacheResponse'); // 添加 cms 数据内容
    Route::post('checkout/v2/set-ga-client-id', [CheckoutV2Controller::class, 'setGaClientId'])->name('checkot.v2.product.setclientId')->middleware('cacheResponse');
});