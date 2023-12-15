<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\OneBuy\Http\Controllers\ProductController;

Route::group(['middleware' => ['locale', 'theme', 'currency','web']], function () {

    Route::get('onebuy/{slug}', [ProductController::class, 'detail'])
        ->name('onebuy.product.page')
        ->middleware('cacheResponse');
    
    Route::any("onebuy/order/add/sync", [ProductController::class, "order_add_sync"])
        ->name("onebuy.order.add.sync");



});

