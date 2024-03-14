<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Sales\InvoiceController;
use Webkul\Admin\Http\Controllers\Sales\OrderController;
use Webkul\Admin\Http\Controllers\Sales\RefundController;
use Webkul\Admin\Http\Controllers\Sales\ShipmentController;
use Webkul\Admin\Http\Controllers\Sales\TransactionController;

/**
 * Sales routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.manage_url')], function () {
    Route::prefix('sales')->group(function () {
        /**
         * Invoices routes.
         */
        Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
            Route::get('', 'index')->name('manage.sales.invoices.index');

            Route::get('create/{order_id}', 'create')->name('manage.sales.invoices.create');

            Route::post('create/{order_id}', 'store')->name('manage.sales.invoices.store');

            Route::get('view/{id}', 'view')->name('manage.sales.invoices.view');

            Route::post('send-duplicate/{id}', 'sendDuplicate')->name('manage.sales.invoices.send_duplicate');

            Route::get('print/{id}', 'printInvoice')->name('manage.sales.invoices.print');

            Route::get('{id}transactions', 'invoiceTransactions')->name('manage.sales.invoices.transactions');
        });

        /**
         * Orders routes.
         */
        Route::controller(OrderController::class)->prefix('orders')->group(function () {
            Route::get('', 'index')->name('manage.sales.orders.index');

            Route::get('view/{id}', 'view')->name('manage.sales.orders.view');

            Route::post('cancel/{id}', 'cancel')->name('manage.sales.orders.cancel');

            Route::post('create/{order_id}', 'comment')->name('manage.sales.orders.comment');

            Route::get('search', 'search')->name('manage.sales.orders.search');
        });

        /**
         * Refunds routes.
         */
        Route::controller(RefundController::class)->prefix('refunds')->group(function () {
            Route::get('', 'index')->name('manage.sales.refunds.index');

            Route::get('create/{order_id}', 'create')->name('manage.sales.refunds.create');

            Route::post('create/{order_id}', 'store')->name('manage.sales.refunds.store');

            Route::post('update-qty/{order_id}', 'updateQty')->name('manage.sales.refunds.update_qty');

            Route::get('view/{id}', 'view')->name('manage.sales.refunds.view');
        });

        /**
         * Shipments routes.
         */
        Route::controller(ShipmentController::class)->prefix('shipments')->group(function () {
            Route::get('', 'index')->name('manage.sales.shipments.index');

            Route::get('create/{order_id}', 'create')->name('manage.sales.shipments.create');

            Route::post('create/{order_id}', 'store')->name('manage.sales.shipments.store');

            Route::get('view/{id}', 'view')->name('manage.sales.shipments.view');
        });

        /**
         * Transactions routes.
         */
        Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
            Route::get('', 'index')->name('manage.sales.transactions.index');

            Route::get('create', 'create')->name('manage.sales.transactions.create');

            Route::post('create', 'store')->name('manage.sales.transactions.store');

            Route::get('view/{id}', 'view')->name('manage.sales.transactions.view');
        });
    });
});
