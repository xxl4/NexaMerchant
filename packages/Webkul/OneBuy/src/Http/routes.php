<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\OneBuy\Http\Controllers\ProductController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {

    Route::get('onebuy/{slug}', [ProductController::class, 'detail'])
        ->name('onebuy.product.page')
        ->middleware('cacheResponse');

});

