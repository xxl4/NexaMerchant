<?php

use Nicelizhi\Airwallex\Controllers\AirwallexController;
use Illuminate\Support\Facades\Route;

Route::post('/api/airwallex/webhook', [AirwallexController::class, 'webhook'])->name('airwallex.webhook');

Route::any('/api/airwallex/payment-success', [AirwallexController::class, 'paymentSuccess']) ->name('airwallex.payment.success');