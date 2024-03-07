<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\Category::insert([
            ['nom' => 'Musique'],
            ['nom' => 'Sport'],
            ['nom' => 'Art'],
            ['nom' => 'Technologie'],
            ['nom' => 'Cinéma'],
            ['nom' => 'Théâtre'],
            ['nom' => 'Littérature'],
            ['nom' => 'Voyage']
        ]);

    }
}