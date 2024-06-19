<?php

use Illuminate\Support\Facades\Route;
use NexaMerchant\Google\Http\Controllers\Web\ExampleController;

Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix'=>'Google'], function () {

    Route::controller(ExampleController::class)->prefix('example')->group(function () {

        Route::get('demo', 'demo')->name('Google.web.example.demo');

    });

});

include "admin.php";