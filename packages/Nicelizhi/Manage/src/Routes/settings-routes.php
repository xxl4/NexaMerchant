<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\Settings\ChannelController;
use Nicelizhi\Manage\Http\Controllers\Settings\CurrencyController;
use Nicelizhi\Manage\Http\Controllers\Settings\ExchangeRateController;
use Nicelizhi\Manage\Http\Controllers\Settings\LocaleController;
use Nicelizhi\Manage\Http\Controllers\Settings\InventorySourceController;
use Nicelizhi\Manage\Http\Controllers\Settings\Tax\TaxCategoryController;
use Nicelizhi\Manage\Http\Controllers\Settings\Tax\TaxRateController;
use Nicelizhi\Manage\Http\Controllers\Settings\ThemeController;
use Nicelizhi\Manage\Http\Controllers\Settings\RoleController;
use Nicelizhi\Manage\Http\Controllers\Settings\UserController;

/**
 * Settings routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.manage_url')], function () {
    Route::prefix('settings')->group(function () {
        /**
         * Channels routes.
         */
        Route::controller(ChannelController::class)->prefix('channels')->group(function () {
            Route::get('', 'index')->name('manage.settings.channels.index');

            Route::get('create', 'create')->name('manage.settings.channels.create');

            Route::post('create', 'store')->name('manage.settings.channels.store');

            Route::get('edit/{id}', 'edit')->name('manage.settings.channels.edit');

            Route::put('edit/{id}', 'update')->name('manage.settings.channels.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.settings.channels.delete');
        });

        /**
         * Currencies routes.
         */
        Route::controller(CurrencyController::class)->prefix('currencies')->group(function () {
            Route::get('', 'index')->name('manage.settings.currencies.index');

            Route::post('create', 'store')->name('manage.settings.currencies.store');

            Route::get('edit/{id}', 'edit')->name('manage.settings.currencies.edit');

            Route::put('edit', 'update')->name('manage.settings.currencies.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.settings.currencies.delete');

            Route::post('mass-delete', 'massDestroy')->name('manage.settings.currencies.mass_delete');
        });

        /**
         * Exchange rates routes.
         */
        Route::controller(ExchangeRateController::class)->prefix('exchange-rates')->group(function () {
            Route::get('', 'index')->name('manage.settings.exchange_rates.index');

            Route::post('create', 'store')->name('manage.settings.exchange_rates.store');

            Route::get('edit/{id}', 'edit')->name('manage.settings.exchange_rates.edit');

            Route::get('update-rates', 'updateRates')->name('manage.settings.exchange_rates.update_rates');

            Route::put('edit', 'update')->name('manage.settings.exchange_rates.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.settings.exchange_rates.delete');
        });

        /**
         * Locales routes.
         */
        Route::controller(LocaleController::class)->prefix('locales')->group(function () {
            Route::get('', 'index')->name('manage.settings.locales.index');

            Route::post('create', 'store')->name('manage.settings.locales.store');

            Route::get('edit/{id}', 'edit')->name('manage.settings.locales.edit');

            Route::put('edit', 'update')->name('manage.settings.locales.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.settings.locales.delete');
        });

        /**
         * Inventory sources routes.
         */
        Route::controller(InventorySourceController::class)->prefix('inventory-sources')->group(function () {
            Route::get('', 'index')->name('manage.settings.inventory_sources.index');

            Route::get('create', 'create')->name('manage.settings.inventory_sources.create');

            Route::post('create', 'store')->name('manage.settings.inventory_sources.store');

            Route::get('edit/{id}', 'edit')->name('manage.settings.inventory_sources.edit');

            Route::put('edit/{id}', 'update')->name('manage.settings.inventory_sources.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.settings.inventory_sources.delete');
        });

        Route::prefix('taxes')->group(function () {
            /**
             * Tax categories routes.
             */
            Route::controller(TaxCategoryController::class)->prefix('categories')->group(function () {
                Route::get('', 'index')->name('manage.settings.taxes.categories.index');

                Route::post('', 'store')->name('manage.settings.taxes.categories.store');

                Route::get('edit/{id}', 'edit')->name('manage.settings.taxes.categories.edit');

                Route::put('edit', 'update')->name('manage.settings.taxes.categories.update');

                Route::delete('edit/{id}', 'destroy')->name('manage.settings.taxes.categories.delete');
            });

            /**
             * Tax rates routes.
             */
            Route::controller(TaxRateController::class)->prefix('rates')->group(function () {
                Route::get('', 'index')->name('manage.settings.taxes.rates.index');

                Route::get('create', 'show')->name('manage.settings.taxes.rates.create');

                Route::post('create', 'create')->name('manage.settings.taxes.rates.store');

                Route::get('edit/{id}', 'edit')->name('manage.settings.taxes.rates.edit');

                Route::put('edit/{id}', 'update')->name('manage.settings.taxes.rates.update');

                Route::delete('edit/{id}', 'destroy')->name('manage.settings.taxes.rates.delete');

                Route::post('import', 'import')->name('manage.settings.taxes.rates.import');
            });
        });

        /**
         * Roles routes.
         */
        Route::controller(RoleController::class)->prefix('roles')->group(function () {
            Route::get('', 'index')->name('manage.settings.roles.index');

            Route::get('create', 'create')->name('manage.settings.roles.create');

            Route::post('create', 'store')->name('manage.settings.roles.store');

            Route::get('edit/{id}', 'edit')->name('manage.settings.roles.edit');

            Route::put('edit/{id}', 'update')->name('manage.settings.roles.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.settings.roles.delete');
        });

        /**
         * Users routes.
         */
        Route::controller(UserController::class)->prefix('users')->group(function () {
            Route::get('', 'index')->name('manage.settings.users.index');

            Route::post('create', 'store')->name('manage.settings.users.store');

            Route::get('edit/{id}', 'edit')->name('manage.settings.users.edit');

            Route::put('edit', 'update')->name('manage.settings.users.update');

            Route::delete('edit/{id}', 'destroy')->name('manage.settings.users.delete');

            Route::put('confirm', 'destroySelf')->name('manage.settings.users.destroy');
        });
    });

    Route::controller(ThemeController::class)->prefix('settings/themes')->group(function () {
        Route::get('', 'index')->name('manage.settings.themes.index');

        Route::get('edit/{id}', 'edit')->name('manage.settings.themes.edit');

        Route::post('store', 'store')->name('manage.settings.themes.store');

        Route::post('edit/{id}', 'update')->name('manage.settings.themes.update');

        Route::delete('edit/{id}', 'destroy')->name('manage.settings.themes.delete');
    });
});
