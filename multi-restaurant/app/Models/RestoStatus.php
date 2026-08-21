<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestoStatus extends Model
{
    protected $fillable = [
        'resto_id',
        'status'
    ];

}
