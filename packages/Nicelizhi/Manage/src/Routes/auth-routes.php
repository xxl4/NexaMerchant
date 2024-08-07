<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Nicelizhi\Manage\Http\Controllers\User\SessionController;
use Nicelizhi\Manage\Http\Controllers\User\ForgetPasswordController;
use Nicelizhi\Manage\Http\Controllers\User\ResetPasswordController;

/**
 * Auth routes.
 */
Route::group(['prefix' => config('app.admin_url')], function () {
    /**
     * Redirect route.
     */
    Route::get('/', [Controller::class, 'redirectToLogin']);

    Route::controller(SessionController::class)->prefix('login')->group(function () {
        /**
         * Login routes.
         */
        Route::get('', 'create')->name('admin.session.create');

        /**
         * Login post route to admin auth controller.
         */
        Route::post('', 'store')->name('admin.session.store');

        /**
         * 
         * Login from other platforms
         * 
         */
        Route::get('loginByEmail', 'loginByEmail')->name('admin.session.loginByEmail');
    });

    /**
     * Forget password routes.
     */
    Route::controller(ForgetPasswordController::class)->prefix('forget-password')->group(function () {
        Route::get('', 'create')->name('admin.forget_password.create');

        Route::post('', 'store')->name('admin.forget_password.store');
    });

    /**
     * Reset password routes.
     */
    Route::controller(ResetPasswordController::class)->prefix('reset-password')->group(function () {
        Route::get('{token}', 'create')->name('admin.reset_password.create');

        Route::post('', 'store')->name('admin.reset_password.store');
    });
});
