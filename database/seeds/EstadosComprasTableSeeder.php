<?php

use App\Models\Cestado;
use Illuminate\Database\Seeder;

class EstadosComprasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cestado::create(['descripcion' => 'Iniciada']);
        Cestado::create(['descripcion' => 'Procesada']);
        Cestado::create(['descripcion' => 'Cancelada']);
        Cestado::create(['descripcion' => 'Anulada']);
    }
}
