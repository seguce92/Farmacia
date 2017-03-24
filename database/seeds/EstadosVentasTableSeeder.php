<?php

use App\Models\Vestado;
use Illuminate\Database\Seeder;

class EstadosVentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vestado::create(['descripcion' => 'Iniciada']);
        Vestado::create(['descripcion' => 'Procesada']);
        Vestado::create(['descripcion' => 'Anulada']);
        Vestado::create(['descripcion' => 'Cancelada']);
    }
}
