<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Subscription;

#[Fillable(['name', 'last_name', 'email', 'image', 'phone', 'address', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function resto(): HasOne
    {
        return $this->hasOne(
            Resto::class,
            'user_id',
            'id'
        );
    }

    public function notice(): HasMany
    {
        return $this->hasMany(
            Notice::class,
            'user_id',
            'id'
        );
    }

    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }


    public function currentSubscription(): HasOne
    {
        return $this->hasOne(Subscription::class)
            ->where('status', 'active')
            ->latestOfMany();
    }


    public function hasActiveSubscription(): bool
    {
        $subscription = $this->currentSubscription()->first();

        if (!$subscription) {
            return false;
        }


        if (
            !$subscription->ends_at ||
            $subscription->ends_at->isPast()
        ) {

            $subscription->update([
                'status' => 'expired',
            ]);

            return false;
        }


        return true;
    }

    public function isFreeUser(): bool
    {
        return !$this->hasActiveSubscription();
    }


    public function isSubscribed(): bool
    {
        return $this->hasActiveSubscription();
    }
}
