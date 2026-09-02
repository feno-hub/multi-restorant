<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plat extends Model
{
    /** @use HasFactory<\Database\Factories\PlatFactory> */
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'name',
        'qty',
        'price',
        'status',
        'image',
        'description',
    ];

    public function menu():BelongsTo {
        return $this->belongsTo(Menu::class);
    }

}
