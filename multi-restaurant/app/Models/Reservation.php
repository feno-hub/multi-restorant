<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'resto_id',
        'date',
        'time',
        'guests',
        'name',
        'email',
        'phone',
        'message'
    ];
}
