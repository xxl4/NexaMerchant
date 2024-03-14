<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Controllers\User\SessionController;
use Webkul\Admin\Http\Controllers\User\ForgetPasswordController;
use Webkul\Admin\Http\Controllers\User\ResetPasswordController;

/**
 * Auth routes.
 */
Route::group(['prefix' => config('app.manage_url')], function () {
    /**
     * Redirect route.
     */
    Route::get('/', [Controller::class, 'redirectToLogin']);

    Route::controller(SessionController::class)->prefix('login')->group(function () {
        /**
         * Login routes.
         */
        Route::get('', 'create')->name('manage.session.create');

        /**
         * Login post route to manage auth controller.
         */
        Route::post('', 'store')->name('manage.session.store');
    });

    /**
     * Forget password routes.
     */
    Route::controller(ForgetPasswordController::class)->prefix('forget-password')->group(function () {
        Route::get('', 'create')->name('manage.forget_password.create');

        Route::post('', 'store')->name('manage.forget_password.store');
    });

    /**
     * Reset password routes.
     */
    Route::controller(ResetPasswordController::class)->prefix('reset-password')->group(function () {
        Route::get('{token}', 'create')->name('manage.reset_password.create');

        Route::post('', 'store')->name('manage.reset_password.store');
    });
});
