<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Apps\Http\Controllers\Admin\ExampleController;

Route::group(['middleware' => ['admin','admin_option_log'], 'prefix' => config('app.admin_url')], function () {
    Route::prefix('Apps')->group(function () {

        Route::controller(ExampleController::class)->prefix('example')->group(function () {

            Route::get('demo', 'demo')->name('Apps.admin.example.demo');

        });

    });
});