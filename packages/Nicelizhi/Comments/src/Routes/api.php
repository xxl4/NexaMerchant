<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Comments\Http\Controllers\ApiController;
// api
Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix' => 'api'], function () {

    Route::controller(ApiController::class)->prefix('reviews')->group(function () {

        Route::get("{slug}", "CommentsListSlug")->name("api.comments.list.slug");
        Route::get("", "index")->name("api.comments.list.slug");
    });
});