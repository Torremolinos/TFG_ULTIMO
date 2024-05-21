<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderItemSeeder;
use Database\Seeders\ProductSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Ruy',
            'email' => 'ruy@ruy.com',
            'password' => bcrypt('ruy'),
            'role' => 'user',

        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'jhon@jhon.com',
            'password' => bcrypt('jhon'),
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Dani',
            'email' => 'dani@dani.com',
            'password' => bcrypt('dani'),
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Ramon',
            'email' => 'ramon@ramon.com',
            'password' => bcrypt('ramon'),
            'role' => 'user',
        ]);
        


    }
}
