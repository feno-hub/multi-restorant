<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'resto_id',
        'order_number',
        'subtotal',
        'delivery_fee',
        'total',
        'status',
        'note',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resto(): BelongsTo
    {
        return $this->belongsTo(Resto::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}