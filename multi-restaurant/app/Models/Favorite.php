<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'resto_id',
    ];

    public function  userFavorite() : BelongsTo {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function restoFavorite() : BelongsTo {
        return $this->belongsTo(
            Resto::class,
            'resto_id',
            'id'
        );
    }

}
