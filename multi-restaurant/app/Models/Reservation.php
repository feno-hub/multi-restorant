<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'resto_id',
        'name',
        'email',
        'phone',
        'message',
        'date',
        'time',
        'guests',
        'status',
    ];

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
