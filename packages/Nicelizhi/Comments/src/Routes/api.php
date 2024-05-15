<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Comments\Http\Controllers\ApiController;
// api
Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix' => 'api'], function () {

    Route::controller(ApiController::class)->prefix('comments')->group(function () {

        Route::get("reviews/{id}", "CommentsListID")->name("api.comments.list.id");
        Route::get("reviews/{slug}", "CommentsListSlug")->name("api.comments.list.slug");
        Route::get("reviews", "index")->name("api.comments.list.slug");
    });
});