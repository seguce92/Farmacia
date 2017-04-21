<?php

use Illuminate\Database\Seeder;

class HorariosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('horarios')->delete();
        
        \DB::table('horarios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'dia' => 1,
                'hora_ini' => 8,
                'hora_fin' => 21,
                'created_at' => '2017-04-21 10:13:44',
                'updated_at' => '2017-04-21 11:17:20',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'dia' => 2,
                'hora_ini' => 8,
                'hora_fin' => 21,
                'created_at' => '2017-04-21 10:20:54',
                'updated_at' => '2017-04-21 10:20:54',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'dia' => 3,
                'hora_ini' => 8,
                'hora_fin' => 21,
                'created_at' => '2017-04-21 10:22:26',
                'updated_at' => '2017-04-21 10:22:26',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'dia' => 4,
                'hora_ini' => 8,
                'hora_fin' => 21,
                'created_at' => '2017-04-21 10:22:42',
                'updated_at' => '2017-04-21 10:22:42',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'dia' => 5,
                'hora_ini' => 8,
                'hora_fin' => 21,
                'created_at' => '2017-04-21 10:23:21',
                'updated_at' => '2017-04-21 11:16:52',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'dia' => 6,
                'hora_ini' => 8,
                'hora_fin' => 21,
                'created_at' => '2017-04-21 10:23:42',
                'updated_at' => '2017-04-21 10:23:42',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'dia' => 7,
                'hora_ini' => 8,
                'hora_fin' => 21,
                'created_at' => '2017-04-21 10:23:50',
                'updated_at' => '2017-04-21 10:32:27',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}