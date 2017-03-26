<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OptionTableSeeder::class);
        $this->call(RolsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EstadosItemsTableSeeder::class);
        $this->call(EstadosComprasTableSeeder::class);
        $this->call(IcategoriasTableSeeder::class);
        $this->call(UnimedsTableSeeder::class);
        $this->call(EstadosVentasTableSeeder::class);
        $this->call(TcomprobantesTableSeeder::class);
    }
}
