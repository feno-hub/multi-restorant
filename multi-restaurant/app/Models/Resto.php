<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resto extends Model
{
    /** @use HasFactory<\Database\Factories\RestoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'phone',
        'email',
        'address',
        'city',
        'description',
        'open_time',
        'close_time',
        'logo',
        'cover',
        'instat',
        'website',
        'status'
    ];

    public function restoStat(): HasOne
    {
        return $this->hasOne(
            RestoStatus::class,
            'resto_id',
            'id'
        );
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(
            Subscription::class,
            'restaurant_id',
            'id'
        );
    }

    public function currentSubscription(): HasOne
    {
        return $this->hasOne(
            Subscription::class,
            'restaurant_id',
            'id'
        )
            ->whereIn('status', [
                'trial',
                'active'
            ])
            ->latestOfMany();
    }

    // public function hasActiveSubscription(): bool
    // {
    //     $subscription = $this->activeSubscription()->first();

    //     if (!$subscription) {
    //         return false;
    //     }

    //     return $subscription->isActive();
    // }

    public function hasActiveSubscription(): bool
    {
        $subscription = $this->currentSubscription()->first();

        if (!$subscription) {
            return false;
        }

        return $subscription->isActive();
    }
}
