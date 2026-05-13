<?php

namespace Database\Seeders;

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
    \App\Models\Category::factory(10)
        ->hasProducts(5)
        ->create();

    \App\Models\User::factory()->create([
        'name' => 'Admin PixelStore',
        'email' => 'admin@pixelstore.com',
    ]);
}
}
