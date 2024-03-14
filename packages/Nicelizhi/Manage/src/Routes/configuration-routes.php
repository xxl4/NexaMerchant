<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\ConfigurationController;

/**
 * Configuration routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.manage_url')], function () {
    Route::controller(ConfigurationController::class)->prefix('configuration/{slug?}/{slug2?}')->group(function () {
        Route::get('', 'index')->name('manage.configuration.index');

        Route::post('', 'store')->name('manage.configuration.store');

        Route::get('{path}', 'download')->defaults('_config', [
            'redirect' => 'manage.configuration.index',
        ])->name('manage.configuration.download');
    });
});
