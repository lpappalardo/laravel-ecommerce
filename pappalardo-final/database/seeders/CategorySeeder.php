<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([ // 1
            'name' => 'Lanzamientos',
        ]);
        Category::create([ // 2
            'name' => 'Eventos',
        ]);
        Category::create([ // 3
            'name' => 'Entrevistas',
        ]);
        Category::create([ // 4
            'name' => 'Recomendaciones',
        ]);
        Category::create([ // 5
            'name' => 'Juvenil',
        ]);
        Category::create([ // 6
            'name' => 'Adultos',
        ]);
        Category::create([ // 7
            'name' => 'Sagas Completas',
        ]);
        Category::create([ // 8
            'name' => 'Sagas en Publicación',
        ]);
    }
}
