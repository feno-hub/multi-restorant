<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation_info extends Model
{
    protected $fillable = [
        'resto_id',
        'price',
        'table',
        'place',
        'delay',
        'is_active'
    ];

    public function resto() : BelongsTo {
        return $this->belongsTo(
            Resto::class,
            'resto_id',
            'id'
        );
    }

}
