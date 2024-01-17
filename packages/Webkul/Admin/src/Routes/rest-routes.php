<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\DashboardController;
use Webkul\Admin\Http\Controllers\DataGridController;
<<<<<<< HEAD
=======
use Webkul\Admin\Http\Controllers\MagicAIController;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Admin\Http\Controllers\TinyMCEController;
use Webkul\Admin\Http\Controllers\User\AccountController;
use Webkul\Admin\Http\Controllers\User\SessionController;

/**
 * Extra routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    /**
     * Dashboard routes.
     */
<<<<<<< HEAD
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
=======
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        Route::get('', 'index')->name('admin.dashboard.index');

        Route::get('stats', 'stats')->name('admin.dashboard.stats');
    });
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    /**
     * Datagrid routes.
     */
    Route::get('datagrid/look-up', [DataGridController::class, 'lookUp'])->name('admin.datagrid.look_up');

    /**
     * Tinymce file upload handler.
     */
    Route::post('tinymce/upload', [TinyMCEController::class, 'upload'])->name('admin.tinymce.upload');

    /**
<<<<<<< HEAD
=======
     * AI Routes
     */
    Route::controller(MagicAIController::class)->prefix('magic-ai')->group(function () {
        Route::post('content', 'content')->name('admin.magic_ai.content');

        Route::post('image', 'image')->name('admin.magic_ai.image');
    });

    /**
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Admin profile routes.
     */
    Route::controller(AccountController::class)->prefix('account')->group(function () {
        Route::get('', 'edit')->name('admin.account.edit');

        Route::put('', 'update')->name('admin.account.update');
    });

    Route::delete('logout', [SessionController::class, 'destroy'])->name('admin.session.destroy');
});
