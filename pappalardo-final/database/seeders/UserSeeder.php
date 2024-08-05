<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Ana',
                'role' => 'admin',
                'email' => 'ana@gmail.com',
                'password' => Hash::make('abcd'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Juana',
                'role' => 'client',
                'email' => 'juana@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('orders')->insert([
            [
                'id' => 1,
                'user_fk' => 2,
                'book_fk' => 2,
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'user_fk' => 2,
                'book_fk' => 1,
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
