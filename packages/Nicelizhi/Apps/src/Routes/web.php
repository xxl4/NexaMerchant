<?php
use Illuminate\Support\Facades\Route;
use Nicelizhi\Apps\Http\Controllers\Web\ExampleController;

Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix'=>'Apps'], function () {

    Route::controller(ExampleController::class)->prefix('example')->group(function () {

        Route::get('demo', 'demo')->name('Apps.web.example.demo');

    });

});

include "admin.php";
