<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $fillable = [
        "order_id",
        "product_id",
        "quantity",
        "price",
    ];
}
