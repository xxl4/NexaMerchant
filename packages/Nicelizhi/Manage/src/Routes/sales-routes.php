<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\Sales\InvoiceController;
use Nicelizhi\Manage\Http\Controllers\Sales\OrderController;
use Nicelizhi\Manage\Http\Controllers\Sales\RefundController;
use Nicelizhi\Manage\Http\Controllers\Sales\ShipmentController;
use Nicelizhi\Manage\Http\Controllers\Sales\TransactionController;
use Nicelizhi\Manage\Http\Controllers\Sales\DisputesController;

/**
 * Sales routes.
 */
Route::group(['middleware' => ['admin','admin_option_log'], 'prefix' => config('app.admin_url')], function () {
    Route::prefix('sales')->group(function () {
        /**
         * Invoices routes.
         */
        Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
            Route::get('', 'index')->name('admin.sales.invoices.index');

            Route::get('create/{order_id}', 'create')->name('admin.sales.invoices.create');

            Route::post('create/{order_id}', 'store')->name('admin.sales.invoices.store');

            Route::get('view/{id}', 'view')->name('admin.sales.invoices.view');

            Route::post('send-duplicate/{id}', 'sendDuplicate')->name('admin.sales.invoices.send_duplicate');

            Route::get('print/{id}', 'printInvoice')->name('admin.sales.invoices.print');

            Route::get('{id}transactions', 'invoiceTransactions')->name('admin.sales.invoices.transactions');
        });

        /**
         * Orders routes.
         */
        Route::controller(OrderController::class)->prefix('orders')->group(function () {
            Route::get('', 'index')->name('admin.sales.orders.index');

            Route::get('view/{id}', 'view')->name('admin.sales.orders.view');

            Route::post('cancel/{id}', 'cancel')->name('admin.sales.orders.cancel');

            Route::post('create/{order_id}', 'comment')->name('admin.sales.orders.comment');

            Route::get('search', 'search')->name('admin.sales.orders.search');

            Route::get('duplicate', 'duplicate')->name("admin.sales.orders.duplicate"); // duplicate orders
            Route::get('un-post', 'unpost')->name("admin.sales.orders.unpost"); // un send to shopify orders
            Route::get('abnormal', 'abnormal')->name("admin.sales.orders.abnormal"); // abnormal orders
            Route::get('confirm-payment/{id}', 'confirmpayment')->name("admin.sales.orders.confirm-payment"); // abnormal orders
            Route::get('re-push/{id}', 'repush')->name("admin.sales.orders.re-push"); // re-push orders
        });

        /**
         * Refunds routes.
         */
        Route::controller(RefundController::class)->prefix('refunds')->group(function () {
            Route::get('', 'index')->name('admin.sales.refunds.index');

            Route::get('create/{order_id}', 'create')->name('admin.sales.refunds.create');

            Route::post('create/{order_id}', 'store')->name('admin.sales.refunds.store');

            Route::post('update-qty/{order_id}', 'updateQty')->name('admin.sales.refunds.update_qty');

            Route::get('view/{id}', 'view')->name('admin.sales.refunds.view');
        });

        /**
         * Shipments routes.
         */
        Route::controller(ShipmentController::class)->prefix('shipments')->group(function () {
            Route::get('', 'index')->name('admin.sales.shipments.index');

            Route::get('create/{order_id}', 'create')->name('admin.sales.shipments.create');

            Route::post('create/{order_id}', 'store')->name('admin.sales.shipments.store');

            Route::get('view/{id}', 'view')->name('admin.sales.shipments.view');
        });

        /**
         * Transactions routes.
         */
        Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
            Route::get('', 'index')->name('admin.sales.transactions.index');

            Route::get('create', 'create')->name('admin.sales.transactions.create');

            Route::post('create', 'store')->name('admin.sales.transactions.store');

            Route::get('view/{id}', 'view')->name('admin.sales.transactions.view');
        });

        /**
         * Disputes routes.
         */
        Route::controller(DisputesController::class)->prefix('disputes')->group(function () {
            Route::get('', 'index')->name('admin.sales.disputes.index');

            // Route::get('create', 'create')->name('admin.sales.transactions.create');

            // Route::post('create', 'store')->name('admin.sales.transactions.store');

            // Route::get('view/{id}', 'view')->name('admin.sales.transactions.view');
        });
    });
});
