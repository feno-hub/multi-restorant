<?php

namespace Database\Seeders;

use App\Models\Resto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
        // Resto::factory(20)->create();

        User::factory()->create([
            'name' => 'Test',
            'last_name' => 'Admin',
            'role' => 'ADMIN',
            'email' => 'admin@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test',
            'last_name' => 'User',
            'role' => 'USER',
            'email' => 'user@example.com',
        ]);

    }

}
