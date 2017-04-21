<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clientes')->delete();
        
        \DB::table('clientes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nit' => '',
                'nombres' => 'C/F      ',
                'apellidos' => ' ',
                'direccion' => NULL,
                'telefono' => NULL,
                'email' => NULL,
                'created_at' => '2017-04-17 11:05:46',
                'updated_at' => '2017-04-21 09:31:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}