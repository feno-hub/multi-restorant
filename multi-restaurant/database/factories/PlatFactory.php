<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Plat;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatFactory extends Factory
{
    protected $model = Plat::class;

    public function definition(): array
    {
        return [
            'menu_id' => Menu::factory(),

            'name' => fake()->randomElement([
                'Pizza Margherita',
                'Burger Royal',
                'Poulet Grillé',
                'Steak Frites',
                'Pâtes Carbonara',
                'Salade César',
                'Riz au Poulet',
                'Poisson Grillé',
                'Tacos Poulet',
                'Spaghetti Bolognaise',
                'Lasagnes',
                'Brochettes de Zébu',
            ]),

            'image' => 'plats/default.jpg',

            'description' => fake()->sentence(12),

            'qty' => fake()->randomElement([
                'Disponible',
                'En stock',
                '20',
                '30',
                '50',
            ]),

            'price' => fake()->randomFloat(2, 5000, 50000),

            'category' => fake()->randomElement([
                'Entrée',
                'Plat principal',
                'Dessert',
                'Pizza',
                'Burger',
                'Salade',
                'Boisson',
            ]),
        ];
    }
}