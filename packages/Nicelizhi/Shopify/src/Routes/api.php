<?php

use Illuminate\Support\Facades\Route;

use Nicelizhi\Shopify\Http\Controllers\WebhooksController;
use Nicelizhi\Shopify\Http\Controllers\ApiController;


Route::group(['middleware' => ['api'], 'prefix' => 'shopify'], function () {

    Route::prefix('webhooks')->group(function () {
        Route::controller(WebhooksController::class)->group(function () {
            Route::post('v1', 'v1')->name('shopify.webhook.v1.other');
        });
        //Route::post('.', 'WebhooksController@v1')->name('shopify.webhook.v1.other');
    });


    Route::prefix('v1')->group(function () {

        Route::controller(WebhooksController::class)->prefix('webhooks')->group(function () {
            Route::post('.', 'v1')->name('shopify.webhook.v1');
            // orders
            Route::post('orders/updated', 'orders_updated')->name('shopify.webhook.v1.orders.updated');
            Route::post('orders/create', 'orders_create')->name('shopify.webhook.v1.orders.create');
            Route::post('orders/fulfilled', 'orders_fulfilled')->name('shopify.webhook.v1.orders.fulfilled');
            Route::post('orders/edited', 'orders_edited')->name('shopify.webhook.v1.orders.edited');
            Route::post('orders/paid', 'orders_paid')->name('shopify.webhook.v1.orders.paid');
            Route::post('order_transactions/create', 'order_transactions_create')->name('shopify.webhook.v1.order_transactions.create');
            //products
            Route::post('products/create', 'products_create')->name('shopify.webhook.v1.products.create');
            Route::post('products/delete', 'products_delete')->name('shopify.webhook.v1.products.delete');
            Route::post('products/update', 'products_update')->name('shopify.webhook.v1.products.update');

            //fulfillments
            Route::post('fulfillments/create', 'fulfillments_create')->name('shopify.webhook.v1.fulfillments.create');
            Route::post('fulfillments/update', 'fulfillments_update')->name('shopify.webhook.v1.fulfillments.update');

            //refund
            Route::post('refunds/create', 'refunds_create')->name('shopify.webhook.v1.refunds.create');

            // cuustomers
            Route::post('customers/create', 'customers_create')->name('shopify.webhook.v1.customers.create');
            Route::post('customers/update', 'customers_update')->name('shopify.webhook.v1.customers_update');
        });

        Route::controller(ApiController::class)->prefix('api')->group(function () {
            Route::get('images/{product_id}', 'shopifyImages')->name('shopify.api.v1.shopify.images');
            Route::get('full/{product_id}', 'ShopifyFull')->name('shopify.api.v1.shopify.full');
            Route::get('products/feeds', 'feeds')->name('shopify.api.v1.shopify.feeds');
            
        });

    });
});