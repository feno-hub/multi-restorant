<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $fillable = [
        'resto_id',
        'name',
        'stat',
        'image',
        'description'
    ];



    public function like() : HasMany {
        return $this->hasMany(
            Like::class,
            'menu_id',
            'id'
        );
    }

    public function plat(): HasMany {
        return $this->hasMany(
            Plat::class,
            'menu_id',
            'id'
        );
    }

    public function resto() : BelongsTo {
        return $this->belongsTo(
            Resto::class,
            'resto_id',
            'id'
        );
    }

}
