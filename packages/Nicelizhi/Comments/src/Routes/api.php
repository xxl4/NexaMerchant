<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Comments\Http\Controllers\ApiController;
// api
Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix' => 'api'], function () {

    Route::controller(ApiController::class)->prefix('comments')->group(function () {

        Route::get("list/{slug}", "CommentsListSlug")->name("api.comments.list.slug");
    });
});