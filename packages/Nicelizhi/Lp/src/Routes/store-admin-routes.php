<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Lp\Http\Controllers\AdminLpController;

/**
 * Lp routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::controller(AdminLpController::class)->prefix('lp')->group(function () {
        Route::get('/', 'index')->name('admin.lp.index');

        Route::get('create', 'create')->name('admin.lp.create');

        Route::post('create', 'store')->name('admin.lp.store');

        Route::get('edit/{id}', 'edit')->name('admin.lp.edit');

        
        Route::get('copy/{id}', 'copy')->name('admin.lp.copy');



        Route::put('edit/{id}', 'update')->name('admin.lp.update');

        Route::delete('edit/{id}', 'delete')->name('admin.lp.delete');

        Route::post('mass-delete', 'massDelete')->name('admin.lp.mass_delete');
    });
});