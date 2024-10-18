<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\OneBuy\Http\Controllers\ProductController;
use Nicelizhi\OneBuy\Http\Controllers\ProductV2Controller;
use Nicelizhi\OneBuy\Http\Controllers\ProductV3Controller;
use Nicelizhi\OneBuy\Http\Controllers\ProductV4Controller;
use Nicelizhi\OneBuy\Http\Controllers\ProductV5Controller;
use Nicelizhi\OneBuy\Http\Controllers\ApiController;

// api
Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix' => 'api'], function () {

    Route::controller(ApiController::class)->prefix('onebuy')->group(function () {

        Route::any("order/add/sync", "OrderAddSync")->name("api.onebuy.order.add.sync");
        Route::any("order/addr/after", "OrderAddrAfter")->name("api.onebuy.order.addr.after");
        Route::any("order/status", "OrderStatus")->name("api.onebuy.order.status");
        Route::any("order/query", "OrderQuery")->name("api.onebuy.order.query");
        Route::get("order/log", "OrderLog")->name("api.onebuy.order.log");
        Route::get("order/confirm", "OrderConfirm")->name("api.onebuy.order.confirm");
        Route::post("check/coupon", "CheckCoupon")->name("api.onebuy.check.coupon");
        
        
        Route::get("faq", "faq")->name("api.onebuy.faq");
        Route::get("cms/{slug}", "cms")->name("api.onebuy.cms");
        Route::get("product/detail/{slug}", "productDetail")->name("api.onebuy.product.detail");
    });
});

// default
Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('onebuy/{slug}', [ProductController::class, 'detail'])
        ->name('onebuy.product.page')
        ->middleware('cacheResponse');
    
    Route::any("onebuy/order/add/sync", [ProductController::class, "order_add_sync"])
        ->name("onebuy.order.add.sync");
    
    Route::any('onebuy/order/addr/after', [ProductController::class, "order_addr_after"])
        ->name("onebuy.order.addr.after");

    Route::any('onebuy/order/status', [ProductController::class, "order_status"])
        ->name("onebuy.order.status");


    Route::get('onebuy/checkout/success', [ProductController::class, "checkout_success"])->name('onebuy.checkout.success');
    Route::get('onebuy/checkout/v1/success/{id}', [ProductController::class, "checkout_success_v1"])->name('onebuy.checkout.success.v1');
    Route::get('onebuy/checkout/v2/success/{id}', [ProductController::class, "checkout_success_v2"])->name('onebuy.checkout.success.v2');
    Route::get('onebuy/checkout/v4/success/{id}', [ProductController::class, "checkout_success_v4"])->name('onebuy.checkout.success.v4');

    Route::get('onebuy/order/query', [ProductController::class, "order_query"])->name('onebuy.order.query');
    Route::get('onebuy/recommended/query', [ProductController::class, "recommended_query"])->name('onebuy.recommended.query');

    Route::get('onebuy/order/log', [ProductController::class, "order_log"])->name('onebuy.order.log');
    Route::get('onebuy/order/confirm', [ProductController::class, "confirm"])->name('onebuy.order.confirm');

    Route::get('onebuy/page/{slug}', [ProductController::class, "cms"])->name('onebuy.cms.page');

});

// v2

Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('onebuy/v2/{slug}', [ProductV2Controller::class, 'detail'])
        ->name('onebuy.v2.product.page')
        ->middleware('cacheResponse');


});

// v3

Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('onebuy/v3/{slug}', [ProductV3Controller::class, 'detail'])
        ->name('onebuy.v3.product.page')
        ->middleware('cacheResponse');


});

//v4 coupon
Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('onebuy/v4/{slug}', [ProductV4Controller::class, 'detail'])
        ->name('onebuy.v4.product.page')
        ->middleware('cacheResponse');


});

// v5 
Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('onebuy/v5/{slug}', [ProductV5Controller::class, 'detail'])
        ->name('onebuy.v5.product.page')
        ->middleware('cacheResponse');

    Route::get('onebuy/checkout/v5/success/{id}', [ProductV5Controller::class, "success"])->name('onebuy.checkout.success.v5');

    

});