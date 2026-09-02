<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Resto;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition(): array
    {
        return [
            'resto_id' => Resto::factory(),

            'name' => fake()->randomElement([
                'Menu du jour',
                'Menu déjeuner',
                'Menu spécial',
                'Menu familial',
                'Menu classique',
                'Menu découverte',
                'Menu gourmand',
                'Menu premium',
            ]),

            'stat' => fake()->randomElement([
                'active',
                'inactive',
            ]),

            'image' => 'menus/default.jpg',

            'description' => fake()->sentence(15),
        ];
    }
}