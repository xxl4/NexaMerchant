<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\OneBuy\Http\Controllers\ProductController;

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

    Route::get('onebuy/order/query', [ProductController::class, "order_query"])->name('onebuy.order.query');
    Route::get('onebuy/recommended/query', [ProductController::class, "recommended_query"])->name('onebuy.recommended.query');

    Route::get('onebuy/order/log', [ProductController::class, "order_log"])->name('onebuy.order.log');





});

