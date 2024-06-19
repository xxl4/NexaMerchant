<?php

use Illuminate\Support\Facades\Route;
use NexaMerchant\Google\Http\Controllers\Api\ExampleController;

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
     Route::prefix('Google')->group(function () {

        Route::controller(ExampleController::class)->prefix('example')->group(function () {

            Route::get('demo', 'demo')->name('Google.api.example.demo');

        });

     });
});