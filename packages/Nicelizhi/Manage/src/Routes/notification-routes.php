<?php

use Illuminate\Support\Facades\Route;
use Nicelizhi\Manage\Http\Controllers\NotificationController;

/**
 * Notification routes.
 */
Route::group(['middleware' => ['manage'], 'prefix' => config('app.manage_url')], function () {

    Route::controller(NotificationController::class)->group(function () {
        Route::get('notifications', 'index')->name('manage.notification.index');

        Route::get('get-notifications', 'getNotifications')->name('manage.notification.get_notification');

        Route::get('viewed-notifications/{orderId}', 'viewedNotifications')->name('manage.notification.viewed_notification');

        Route::post('read-all-notifications', 'readAllNotifications')->name('manage.notification.read_all');
    });
});
