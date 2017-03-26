<?php

use App\Models\Tcomprobante;
use Illuminate\Database\Seeder;

class TcomprobantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tcomprobante::create(['nombre' => 'Stock inicial']);
        Tcomprobante::create(['nombre' => 'Factura']);
        Tcomprobante::create(['nombre' => 'Regalo']);
    }
}
