<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use Webkul\Installer\Http\Controllers\InstallerController;


Route::controller(InstallerController::class)->group(function () {
    Route::get('install', 'index')->name('installer.index');

    Route::middleware(StartSession::class)->prefix('install/api')->group(function () {
        Route::post('env-file-setup', 'envFileSetup')->name('installer.env_file_setup');
        
        Route::post('env-file-delete', 'envFileDelete')->name('installer.delete_env_file');
        
        Route::post('run-migration', 'runMigration')->name('installer.run_migration');
    
        Route::post('admin-config-setup', 'adminConfigSetup')->name('installer.admin_config_setup');
    
        Route::post('smtp-config-setup', 'smtpConfigSetup')->name('installer.smtp_config_setup');
    });
});
=======
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Webkul\Installer\Http\Controllers\InstallerController;

Route::middleware(['web', 'installer_locale'])->group(function () {
    Route::controller(InstallerController::class)->group(function () {
        Route::get('install', 'index')->name('installer.index');

        Route::middleware(StartSession::class)->prefix('install/api')->group(function () {
            Route::post('env-file-setup', 'envFileSetup')->name('installer.env_file_setup');

            Route::post('run-migration', 'runMigration')->name('installer.run_migration')->withoutMiddleware('web');

            Route::post('run-seeder', 'runSeeder')->name('installer.run_seeder')->withoutMiddleware('web');

            Route::post('admin-config-setup', 'adminConfigSetup')->name('installer.admin_config_setup')->withoutMiddleware('web');
        });
    });
});
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
