<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Apps\Http\Controllers\Api\ExampleController;
use Nicelizhi\Apps\Http\Controllers\Api\ListsController;

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
     Route::prefix('Apps')->group(function () {

        Route::controller(ExampleController::class)->prefix('example')->group(function () {

            Route::get('demo', 'demo')->name('Apps.api.example.demo');

        });

        Route::controller(ListsController::class)->prefix('list')->group(function () {

            Route::get('apps', 'apps')->name('Apps.api.list.apps');

        });

     });
});