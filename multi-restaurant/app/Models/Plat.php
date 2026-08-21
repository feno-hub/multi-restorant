<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    /** @use HasFactory<\Database\Factories\PlatFactory> */
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'name',
        'category',
        'price',
        'stat',
        'image',
        'description',
    ];

}
