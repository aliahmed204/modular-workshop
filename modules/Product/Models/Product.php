<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\database\factories\ProductFactory;

#[UseFactory(ProductFactory::class)]
class Product extends Model
{
    use SoftDeletes, hasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',

    ];
}
