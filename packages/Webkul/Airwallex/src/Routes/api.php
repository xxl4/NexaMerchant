<?php

use Nicelizhi\Airwallex\Controllers\AirwallexController;
use Illuminate\Support\Facades\Route;

Route::post('/api/airwallex/webhook', [AirwallexController::class, 'webhook'])->name('airwallex.webhook');