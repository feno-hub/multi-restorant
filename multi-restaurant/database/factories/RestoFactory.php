<?php

namespace Database\Factories;

use App\Models\Resto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestoFactory extends Factory
{
    protected $model = Resto::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),

            'name' => fake()->company(),

            'category' => fake()->randomElement([
                'Restaurant',
                'Fast Food',
                'Pizzeria',
                'Cuisine Malagasy',
                'Cuisine Italienne',
                'Cuisine Française',
                'Grillade',
                'Café',
            ]),

            'phone' => fake()->phoneNumber(),

            'email' => fake()->unique()->safeEmail(),

            'address' => fake()->address(),

            'city' => fake()->city(),

            'description' => fake()->sentence(15),

            'open_time' => fake()->randomElement([
                '07:00',
                '08:00',
                '09:00',
                '10:00',
                '11:00',
            ]),

            'close_time' => fake()->randomElement([
                '18:00',
                '20:00',
                '21:00',
                '22:00',
                '23:00',
            ]),

            'logo' => null,

            'cover' => 'restaurants/covers/default.jpg',

            'nifstat' => fake()->userName(),

            'website' => fake()->optional()->url(),

            'status' => fake()->randomElement([
                'en_attent',
                'accepter',
                'refuser',
            ]),
        ];
    }
}