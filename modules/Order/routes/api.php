<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\API\V1\CheckoutController;
use Modules\Order\Http\Controllers\API\V1\OrderController;


Route::get("v1/orders", OrderController::class);

Route::post("v1/orders", CheckoutController::class);
