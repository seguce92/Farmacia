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
        Tcomprobante::crate(['nombre' => 'Stock inicial']);
        Tcomprobante::crate(['nombre' => 'Factura']);
        Tcomprobante::crate(['nombre' => 'Regalo']);
    }
}
