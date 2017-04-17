<?php

use Illuminate\Database\Seeder;

class ProveedoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('proveedores')->delete();
        
        \DB::table('proveedores')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Proveedor de prueba',
                'razon_social' => 'Proveedor de prueba S.A',
                'nit' => '54321',
                'direccion' => '8536 N.W 66 ST',
                'telefono' => '00000000',
                'created_at' => '2017-04-17 11:09:25',
                'updated_at' => '2017-04-17 11:09:25',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}