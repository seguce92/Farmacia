<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::create([
            "nombre"=>"Admin",
            "descripcion"=>"Opciones de administración",
            "icono_l"=>"fa-folder",
            "orden"=>"1",
        ]);

        Option::create([
            "padre"=>"1",
            "nombre"=>"Usuarios",
            "ruta"=>"admin/user",
            "descripcion"=>"Administración de usuarios",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        Option::create([
            "padre"=>"1",
            "nombre"=>"Opciones",
            "ruta"=>"admin/option",
            "descripcion"=>"Administración de las opciones del menu",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        Option::create([
            "padre"=>"1",
            "nombre"=>"Roles",
            "ruta"=>"admin/rols",
            "descripcion"=>"Administración de los roles de los usuarios",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        Option::create([
            "nombre"=>"Ayuda",
            "descripcion"=>"Manual de usuario y tutoriales",
            "icono_l"=>"fa-plus-square",
            "icono_r"=>"",
            "orden"=>"2",
        ]);

        Option::create([
            "nombre"=>"Acerca De...",
            "descripcion"=>"",
            "icono_l"=>"fa-info-circle",
            "icono_r"=>"",
            "orden"=>"2",
        ]);
    }
}
