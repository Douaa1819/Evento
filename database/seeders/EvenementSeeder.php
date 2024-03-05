<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EvenementSeeder extends Seeder
{
    public function run()
    {

        $categoryId = 1; 

        DB::table('evenements')->insert([
            [
                'titre' => 'Concert de Rock',
                'description' => 'Un super concert de rock aura lieu ce weekend!',
                'category_id' => $categoryId,
                'lieu' => 'Paris',
                'date' => Carbon::now()->addDays(10),
                'place_disponible' => 100,
                'validation' => true,
                'admin_validation' => true,
                'image' => 'url/vers/image.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Ajoutez 
        ]);
    }
}


