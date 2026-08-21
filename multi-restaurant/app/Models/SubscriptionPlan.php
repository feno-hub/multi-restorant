<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'duration',
        'features',
        'is_active',
    ];


    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];


    /**
     * Abonnements utilisant ce plan
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(
            Subscription::class,
            'subscription_plan_id'
        );
    }
}