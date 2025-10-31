<?php

use Modules\User\Providers\UserServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    Modules\Product\Providers\ProductServiceProvider::class,
    Modules\Order\Providers\OrderServiceProvider::class,
    UserServiceProvider::class
];
