<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Lp\Http\Controllers\LpController;

Route::group(['middleware' => ['locale', 'theme', 'currency'],'prefix'=>'lp'], function () {
    

    Route::get('{slug}', [LpController::class, 'index'])
        ->name('lp.slug.page')
        ->middleware('cacheResponse');

    /**
     * Fallback route.
     */
    Route::fallback(LpController::class . '@index')
        ->name('shop.lp.index')
        ->middleware('cacheResponse');


});

Route::group(['middleware' => ['locale', 'theme', 'currency'],'prefix'=>'products'], function () {
    

    Route::get('{slug}', [LpController::class, 'index'])
        ->name('lp.products.slug.page')
        ->middleware('cacheResponse');

});
