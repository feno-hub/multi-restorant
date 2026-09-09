<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notice extends Model
{
    /** @use HasFactory<\Database\Factories\NoticeFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resto_id',
        'content',
        'status'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
    public function resto(): BelongsTo {
        return $this->belongsTo(
            Resto::class,
            'resto_id',
            'id'
        );
    }
}
