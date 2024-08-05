<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('publications')->insert([
            [
                'id' => 1,
                'title' => 'Qué es el problema de los tres cuerpos, la fórmula “imposible” que después de siglos aún desvela a la ciencia',
                'subtitle' => 'El éxito de la nueva serie de Netflix volvió a instalar un rompecabezas científico que data de tiempos de Isaac Newton',
                'author' => 'Manuel Fernandez',
                'content' => 'La novela “El problema de los tres cuerpos” del escritor e ingeniero chino Liu Cixin se convirtió en bestseller al poco tiempo de ser publicada en 2006. Casi un par de décadas después, volvió a estar en boca de todos después de que Netflix estrenará la serie basada en el libro. Hoy también es uno de los títulos más elegidos en la plataforma.
                Tanto en el libro como en la serie, los personajes interactúan con un planeta misterioso llamado Trisolaris. El planeta gira alrededor de tres soles al mismo tiempo. Por la inestabilidad de la órbita, las civilizaciones tienen eras de calma, pero también sufren de períodos de caos, de poblaciones enteras destruidas. Los científicos, entonces, buscan una solución a ese dilema que parece irresoluble.
                En realidad, la premisa de la historia se basa en un problema real de la física. Un problema que data de cientos de años atrás, que incluso se remonta a épocas de Issac Newton, quien fue el primero en proponer el concepto de gravedad. Por sus leyes, los físicos saben que es posible determinar las posiciones y velocidades futuras de dos cuerpos, cualquiera sea su masa, que se someten a atracción gravitacional mutua. Un ejemplo concreto es un sistema solar formado tan solo por un sol y un planeta. Por su órbita predecible, se podría decir con total precisión dónde van a estar en cada momento.
                El problema surge cuando son más de dos cuerpos los involucrados. El movimiento de tres o más cuerpos sometidos a gravedad mutua resulta imposible de predecir. Hace más de 120 años, el matemático francés Henri Poincaré mostró que no hay una solución general para el problema expresable en una fórmula. Los objetos pueden dibujar trayectorias irregulares, hasta colisionar entre ellos.
                “Esto significa que, en general, sus órbitas no son estables ni predecibles. Podemos hacer algunas predicciones mediante simulaciones numéricas, pero son muy inestables y dependen del conocimiento exacto de las condiciones iniciales. Es necesario saber exactamente dónde está cada uno de los cuerpos, a qué velocidad y en qué dirección se mueven para poder predecir dónde estarán en un momento posterior. Si estas condiciones iniciales se equivocan aunque sea un poco, con el tiempo la predicción empeorará porque dará un resultado completamente diferente en el futuro. Estos se conocen como sistemas ‘caóticos’”, explicó Matthew Kenzie, profesor de Física en la Universidad de Cambridge, en diálogo con Infobae.
                ',
                'publication_date' => '2024-05-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Brandon Sanderson lo vuelve a hacer',
                'subtitle' => 'Anuncia por sorpresa otra novela secreta del Cosmere',
                'author' => 'Maria Lopez',
                'content' => 'Todo era tranquilidad para los fans de Brandon Sanderson este 2024. Después del tute, para bien, que fue el año pasado con los 4 proyectos secretos de Kickstarter, sólo teníamos la quinta entrega de El Archivo de las Tormentas. Viento y Verdad saldrá al mercado el 6 de diciembre y todo lo que teníamos que hacer era ponernos a repasar la cronología del Cosmere, o descansar hasta el cierre de la primera pentalogía..
                Sin embargo, Sanderson no opina igual. En la parte final del último vídeo subido a su canal, en el que mostraba la edición especial de Palabras Radiantes, el segundo libro del Archivo, el escritor norteamericano soltó la bomba: ha estado trabajando en una nueva novela ambientada en el Cosmere y no tardaremos mucho en saber sobre ella.
                Mientras Sanderson tira en la mesa los folios del manuscrito y pone un libro sin título en la estantería frente a los otros cuatro proyectos secretos, aparecen varios conceptos sobreimpresionados en pantalla. Cosmere, Era Futura y Alta Conectividad con el Cosmere, es lo segundo que vemos tras confirmar que es un nuevo proyecto secreto.
                ',
                'publication_date' => '2024-03-06',
                'created_at' => now(),
                'updated_at' => now(),
                // 'cover' => 'imgs/tYPPUFk3zyNnRcnZPTDsflilKipPNQAayxXoNoPO.jpg',
                // 'cover_description' => 'Brandon Sanderson',
            ],
            [
                'id' => 3,
                'title' => 'El futuro de la saga basada en las novelas de Frank Herbert',
                'subtitle' => 'De las próximas películas de la saga a una serie del mismo universo',
                'author' => 'Ana Rodriguez',
                'content' => 'Se ha convertido en la gran película de lo que va de 2024, y ya se habla de ella como una de las grandes cintas de ciencia-ficción de los últimos años. Dune: Parte Dos arrasa allá por donde pasa, y como hace en la propia película Paul Atreides (Timothée Chalamet) con los Fremen, la película y su director Denis Villeneuve han ido ganando adeptos a su causa. Pero claro, con un final como el de esta película, muchos espectadores se han preguntado por el futuro de la saga, si es que lo hay. Porque hay muchos proyectos pendientes, pero de momento nada en firme, así que solo basta echar un ojo a las novelas originales en las que se basan las películas para atisbar el destino de Paul Atreides y su familia. Eso sí, atención, porque a partir de aquí vienen spoilers de Dune: Parte Dos.
                El final de Dune: Parte Dos nos deja en todo lo alto, con la victoria de Paul Atreides frente a Feyd-Rautha Harkonnen (Austin Butler) en su duelo a muerte, y con el ejército Fremen arrasando las tropas del Emperador Shaddam Corrino IV (Christopher Walken) y los propios Harkonnen. El Barón Harkonnen (Stellan Skarsgaard) también muere a manos de Paul -a pesar de que en la novela es realmente la hermana de este, Alia, quien le quita la vida-, mientras que el Emperador es tomado como prisionero junto a su hija la Princesa Irulan (Florence Pugh), la cual se desvela se convertirá en la esposa de Paul para gobernar la galaxia. Lo último que vemos es precisamente a Chani (Zendaya) abandonando al resto y refugiándose en el desierto, decepcionada por la actitud de Paul y consciente de lo que está por venir: una yihad que puede que lleve a los Fremen a lo más alto, pero que también se cobrará millones de vidas inocentes a su paso.
                Así pues, Dune: Parte Dos termina de forma abrupta ante el inicio de una especie de guerra santa intergaláctica, que es como termina también la novela original de Frank Herbert, dando a entender que las profecías de Paul eran ciertas y realmente estaba llamado a ser el salvador de los Fremen y la galaxia. No obstante, la siguiente entrega de la saga, Dune Messiah, empieza ya con un salto temporal de 12 años. Nada de guerras ni más duelos a cuchillo, solo un Paul Atreides ya nombrado Emperador del universo y gobernando con puño de hierro sobre todos, incluido los propios Fremen, como el Kwisatz Haderach que se esperaba que fuese. Sin embargo, la forma de gobernar de Paul superada su cruzada empieza a levantar ciertas dudas entre las facciones más ortodoxas de los Fremen, quienes ven como parte de su cultura se ha empezado a diluir y casi perderse en su expansión por toda la galaxia. Y es ahí donde empiezan los problemas.
                ',
                'publication_date' => '2024-04-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('publications_have_categories')->insert([
            [
                'publication_fk' => 1,
                'category_fk' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publication_fk' => 1,
                'category_fk' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publication_fk' => 2,
                'category_fk' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publication_fk' => 2,
                'category_fk' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publication_fk' => 2,
                'category_fk' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publication_fk' => 3,
                'category_fk' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
