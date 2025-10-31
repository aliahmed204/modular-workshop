<?php

namespace Modules\User\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{

    public function boot()
    {
        $this->routes(function () {
            Route::middleware('api')->prefix('api')->group(__DIR__ . '/../routes/api.php');
        });
    }
}
