<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\API\V1\CheckoutController;


Route::post("v1/order", CheckoutController::class);
