<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Laptops y Equipos Armados',
            'Monitores y Pantallas',
            'Componentes de PC',
            'Accesorios y Periféricos',
            'Consolas y Videojuegos',
            'Herramientas y Refacciones'
        ];

        foreach ($categorias as $nombre) {
            \App\Models\Category::factory()->hasProducts(5)->create([
                'name' => $nombre,
                'slug' => str($nombre)->slug(),
            ]);
        }

        \App\Models\User::factory()->create([
            'name' => 'Admin PixelStore',
            'email' => 'admin@pixelstore.com',
        ]);
    }
}