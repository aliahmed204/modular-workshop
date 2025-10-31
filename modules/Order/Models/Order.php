<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'address',
        'items',
        'user_id',
        'total',
        'discount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts()
    {
        return [
            'items' => 'array',
        ];
    }

    public function orderLines(): HasMany|Order
    {
        return $this->hasMany(OrderLine::class);
    }
}
