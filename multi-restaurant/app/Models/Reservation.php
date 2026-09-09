<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'resto_id',
        'name',
        'email',
        'phone',
        'guests',
        'message',
        'date',
        'time',
        'total',
        'status',
    ];

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function resto() : BelongsTo {
        return $this->belongsTo(
            Resto::class,
            'resto_id',
            'id'
        );
    }
}
