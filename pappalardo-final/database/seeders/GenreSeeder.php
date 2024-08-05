<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([ // 1
            'name' => 'Acción',
        ]);
        Genre::create([ // 2
            'name' => 'Aventuras',
        ]);
        Genre::create([ // 3
            'name' => 'Bélica',
        ]);
        Genre::create([ // 4
            'name' => 'Ciencia Ficción',
        ]);
        Genre::create([ // 5
            'name' => 'Romance',
        ]);
        Genre::create([ // 6
            'name' => 'Comedía',
        ]);
        Genre::create([ // 7
            'name' => 'Thriller',
        ]);
        Genre::create([ // 8
            'name' => 'Histórica',
        ]);
        Genre::create([ // 9
            'name' => 'Fantasía',
        ]);
    }
}
