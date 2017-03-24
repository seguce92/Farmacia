<?php

use App\Models\Icategoria;
use Illuminate\Database\Seeder;

class IcategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icategoria::create(['nombre'=>'Medicamentos','descripcion'=>'']);
        Icategoria::create(['nombre'=>'Higiene','descripcion'=>'']);
        Icategoria::create(['nombre'=>'Oficina','descripcion'=>'']);
    }
}
