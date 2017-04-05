<?php

use Illuminate\Database\Seeder;

class ClasificacionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clasificacions')->delete();
        
        \DB::table('clasificacions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'clasificacion_id' => NULL,
                'nombre' => 'Según la prescripción médica',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'clasificacion_id' => NULL,
                'nombre' => 'Según derecho de explotación',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'clasificacion_id' => NULL,
                'nombre' => 'Según la vía de administración',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'clasificacion_id' => 3,
                'nombre' => 'Oral',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'clasificacion_id' => 3,
                'nombre' => 'Sublingual',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'clasificacion_id' => 3,
                'nombre' => 'Parenteral',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'clasificacion_id' => 3,
                'nombre' => 'Rectal',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'clasificacion_id' => 3,
                'nombre' => 'Tópica',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'clasificacion_id' => 3,
                'nombre' => 'Percutánea o transdérmica',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'clasificacion_id' => 3,
                'nombre' => 'Inhalada',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'clasificacion_id' => 4,
                'nombre' => 'Gotas',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'clasificacion_id' => 4,
                'nombre' => 'Jarabes',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'clasificacion_id' => 4,
                'nombre' => 'Tisanas',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'clasificacion_id' => 4,
                'nombre' => 'Elixires',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'clasificacion_id' => 4,
                'nombre' => 'Suspensiones',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'clasificacion_id' => 4,
                'nombre' => 'Suspensión extemporánea',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'clasificacion_id' => 4,
                'nombre' => 'Viales bebibles',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'clasificacion_id' => 4,
                'nombre' => 'Comprimidos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'clasificacion_id' => 4,
                'nombre' => 'Cápsulas',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'clasificacion_id' => 4,
                'nombre' => 'Granulados',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'clasificacion_id' => 4,
                'nombre' => 'Sellos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'clasificacion_id' => 4,
                'nombre' => 'Píldoras',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'clasificacion_id' => 4,
                'nombre' => 'Pastillas',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'clasificacion_id' => 4,
                'nombre' => 'Pastillas oficinales o trociscos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'clasificacion_id' => 4,
                'nombre' => 'Liofilizados',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'clasificacion_id' => 6,
                'nombre' => 'Vía intravenosa',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'clasificacion_id' => 6,
                'nombre' => 'Vía intraarterial',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'clasificacion_id' => 6,
                'nombre' => 'Vía intramuscular',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'clasificacion_id' => 6,
                'nombre' => 'Vía subcutánea',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'clasificacion_id' => 6,
                'nombre' => 'Otras vías parenterales',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'clasificacion_id' => 7,
                'nombre' => 'Supositorios',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'clasificacion_id' => 7,
                'nombre' => 'Cápsulas rectales',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'clasificacion_id' => 7,
                'nombre' => 'Soluciones y dispersiones rectales',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'clasificacion_id' => 7,
                'nombre' => 'Pomadas rectales',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'clasificacion_id' => 8,
                'nombre' => 'Baños',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'clasificacion_id' => 8,
                'nombre' => 'Lociones',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'clasificacion_id' => 8,
                'nombre' => 'Toques o pincelaciones',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'clasificacion_id' => 8,
                'nombre' => 'Tinturas',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'clasificacion_id' => 8,
                'nombre' => 'Linimentos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'clasificacion_id' => 8,
                'nombre' => 'Polvos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'clasificacion_id' => 8,
                'nombre' => 'Pastas',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'clasificacion_id' => 8,
                'nombre' => 'Pomadas o ungüentos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'clasificacion_id' => 8,
                'nombre' => 'Emulsiones',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'clasificacion_id' => 8,
                'nombre' => 'Geles',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'clasificacion_id' => 8,
                'nombre' => 'Champús',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'clasificacion_id' => 8,
                'nombre' => 'Colirios',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'clasificacion_id' => 8,
                'nombre' => 'Gotas óticas y nasales',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'clasificacion_id' => 8,
                'nombre' => 'Apósitos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'clasificacion_id' => 9,
                'nombre' => 'Parches transdérmicos',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'clasificacion_id' => 9,
                'nombre' => 'La iontoforesis',
                'created_at' => '2017-04-04 00:00:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}