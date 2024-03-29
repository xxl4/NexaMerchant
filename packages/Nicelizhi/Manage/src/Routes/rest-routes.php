<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\DashboardController;
use Nicelizhi\Manage\Http\Controllers\DataGridController;
use Nicelizhi\Manage\Http\Controllers\TinyMCEController;
use Nicelizhi\Manage\Http\Controllers\User\AccountController;
use Nicelizhi\Manage\Http\Controllers\User\SessionController;

/**
 * Extra routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    /**
     * Dashboard routes.
     */
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    /**
     * Datagrid routes.
     */
    Route::get('datagrid/look-up', [DataGridController::class, 'lookUp'])->name('admin.datagrid.look_up');

    /**
     * Tinymce file upload handler.
     */
    Route::post('tinymce/upload', [TinyMCEController::class, 'upload'])->name('admin.tinymce.upload');

    /**
     * Admin profile routes.
     */
    Route::controller(AccountController::class)->prefix('account')->group(function () {
        Route::get('', 'edit')->name('admin.account.edit');

        Route::put('', 'update')->name('admin.account.update');
    });

    Route::delete('logout', [SessionController::class, 'destroy'])->name('admin.session.destroy');
});
