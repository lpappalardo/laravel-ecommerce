<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Format::create([
            'name' => 'Tapa Dura',
        ]);
        Format::create([
            'name' => 'Tapa Blanda',
        ]);
        Format::create([
            'name' => 'Bolsillo',
        ]);
    }
}
