<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('books')->insert([
            [
                'id' => 1,
                'format_fk' => 1,
                'title' => 'The Eye of the World',
                'description' => 'En una pequeña aldea solitaria de la región de Dos Ríos vive Rand, un joven granjero, en compañía de su padre. Una noche son asaltados por trollocs, bestias semihumanas, que hieren al padre. Rand lo traslada al pueblo más cercano para que lo curen y comprueba que los trollocs también han ocasionado graves destrozos. Una poderosa maga, Moraine, afirma que Rand y otros dos muchachos deben huir de la aldea porque son el objetivo de la persecución de los trollocs, quienes obedecen a las fuerzas del mal.',
                'price' => 1099,
                'pages' => 800,
                'author' => 'Robert Jordan',
                'created_at' => now(),
                'updated_at' => now(),
                'cover' => 'imgs/WUXTysKqosDoNvpr2HSBrHRfYE5P1deQXmnhKYQG.png',
                'cover_description' => 'The Eye of the World',
            ],
            [
                'id' => 2,
                'format_fk' => 2,
                'title' => 'The Way of Kings',
                'description' => 'En Roshar, un mundo de piedra y tormentas, extrañas tempestades de increíble potencia barren el rocoso territorio de tal manera que han dado forma a una nueva civilización escondida. Han pasado siglos desde la caída de las diez órdenes consagradas conocidas como los Caballeros Radiantes, pero sus espadas y armaduras aún permanecen. En las Llanuras Quebradas se libra una guerra sin sentido. Kaladin ha sido sometido a la esclavitud, mientras diez ejércitos luchan por separado contra un solo enemigo. El comandante de uno de los otros ejércitos, el señor Dalinar, se siente fascinado por un antiguo texto llamado "El camino de los reyes". Mientras tanto, al otro lado del océano, su eminente y hereje sobrina, Jasnah Kholin, forma a su discípula, la joven Shallan, quien investigará los secretos de los Caballeros Radiantes y la verdadera causa de la guerra.',
                'price' => 1299,
                'pages' => 1007,
                'author' => 'Brandon Sanderson',
                'created_at' => now(),
                'updated_at' => now(),
                'cover' => 'imgs/yLlpzDaovQqAq84KT2AvZni18CBPaHkXMUak2ZJk.png',
                'cover_description' => 'The Way of Kings',
            ],
            [
                'id' => 3,
                'format_fk' => 3,
                'title' => 'Dune',
                'description' => 'La historia se desarrolla alrededor del joven Paul Atreides, heredero del ducado de la Casa Atreides. Su padre, el duque Leto Atreides, recibe del Emperador Padishah Shaddam IV la orden de trasladarse, con todo su ducado, a Arrakis, la única fuente en el Universo Conocido de la especia melange. Paul debe enfrentarse a la traición del Emperador, temeroso de la ascendencia de la Casa Atreides en el Landsraad, y de la Casa Harkonnen, enemigos de los Atreides desde la Batalla de Corrin.',
                'price' => 899,
                'pages' => 658,
                'author' => 'Frank Herbert',
                'created_at' => now(),
                'updated_at' => now(),
                'cover' => 'imgs/UZF1FBSeqP5WTabN0Zdy2J1rJahUWbtbvEIL4bTk.png',
                'cover_description' => 'Dune',
            ],
        ]);

        DB::table('books_have_genres')->insert([
            [
                'book_fk' => 1,
                'genre_fk' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_fk' => 1,
                'genre_fk' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_fk' => 2,
                'genre_fk' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_fk' => 2,
                'genre_fk' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_fk' => 2,
                'genre_fk' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_fk' => 3,
                'genre_fk' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
