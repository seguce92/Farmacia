<?php

use App\Models\Unimed;
use Illuminate\Database\Seeder;

class UnimedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unimed::create(['nombre'=>'Unidad']);
        Unimed::create(['nombre'=>'Milimetros']);
        Unimed::create(['nombre'=>'Gramos']);
    }
}
