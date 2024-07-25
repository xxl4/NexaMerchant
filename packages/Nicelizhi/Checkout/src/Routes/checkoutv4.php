<?php


use Illuminate\Support\Facades\Route;
use Nicelizhi\Checkout\Http\Controllers\CheckoutV4Controller;

Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('checkout/v4/{slug}', [CheckoutV4Controller::class, 'detail'])
        ->name('checkout.v4.product.page')
        ->middleware('cacheResponse');

    Route::post('checkout/v4/downsell', [CheckoutV4Controller::class, 'downsell'])
    ->name('checkout.v4.product.downsell')
    ->middleware('cacheResponse');
    Route::get('checkout/v4/initialize', [CheckoutV4Controller::class, 'initialize'])->name('checkout.v4.product.initialize')->middleware('cacheResponse');

    Route::get('checkout/v4/success/{order_id}', [CheckoutV4Controller::class, 'success'])->name('checkout.v4.product.success')->middleware('cacheResponse');

    Route::get('checkout/v4/cms/{slug}', [CheckoutV4Controller::class, 'cms'])->name('checkout.v4.product.cms')->middleware('cacheResponse'); // 添加 cms 数据内容
    Route::post('checkout/v4/set-ga-client-id', [CheckoutV4Controller::class, 'setGaClientId'])->name('checkout.v4.product.setclientId')->middleware('cacheResponse');
});