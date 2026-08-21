<?php

namespace Database\Factories;

use App\Models\Resto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resto>
 */
class RestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $users = User::all();
        $rand = mt_rand(0, 1);

        return [
            'user_id' => fake()->randomNumber($users, true),
            'name' => fake()->name(),
            'category' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'description' => fake()->paragraphs(3,true),
            'open_time' => fake()->time(),
            'close_time' => fake()->time(),
            'cover' => $rand == 0 ? null : fake()->imageUrl(),
            'instat' => $rand == 0 ? null : fake()->imageUrl(),
            'website' => fake()->url(),
            'status' => fake()->streetName()
        ];
    }
}
