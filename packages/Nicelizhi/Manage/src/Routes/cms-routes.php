<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\CMS\PageController;

/**
 * CMS routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.manage_url')], function () {
    Route::controller(PageController::class)->prefix('cms')->group(function () {
        Route::get('/', 'index')->name('manage.cms.index');

        Route::get('create', 'create')->name('manage.cms.create');

        Route::post('create', 'store')->name('manage.cms.store');

        Route::get('edit/{id}', 'edit')->name('manage.cms.edit');

        Route::put('edit/{id}', 'update')->name('manage.cms.update');

        Route::delete('edit/{id}', 'delete')->name('manage.cms.delete');

        Route::post('mass-delete', 'massDelete')->name('manage.cms.mass_delete');
    });
});
