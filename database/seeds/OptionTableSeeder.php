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
        //1
        Option::create([
            "nombre"=>"Admin",
            "descripcion"=>"Opciones de administración",
            "icono_l"=>"fa-folder",
            "orden"=>"1",
        ]);

        //2
        Option::create([
            "padre"=>"1",
            "nombre"=>"Usuarios",
            "ruta"=>"admin/user",
            "descripcion"=>"Administración de usuarios",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //3
        Option::create([
            "padre"=>"1",
            "nombre"=>"Opciones",
            "ruta"=>"admin/option",
            "descripcion"=>"Administración de las opciones del menu",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //4
        Option::create([
            "padre"=>"1",
            "nombre"=>"Roles",
            "ruta"=>"admin/rols",
            "descripcion"=>"Administración de los roles de los usuarios",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //5
        Option::create([
            "nombre"=>"Inventario",
            "descripcion"=>"",
            "icono_l"=>"fa-th",
            "orden"=>"1",
        ]);

        //6
        Option::create([
            "padre"=>"5",
            "nombre"=>"Categorías",
            "ruta"=>"inventario/categorias",
            "descripcion"=>"Administración de las categorías de los articulos",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //7
        Option::create([
            "padre"=>"5",
            "nombre"=>"Artículos",
            "ruta"=>"inventario/articulos",
            "descripcion"=>"Administración de los artículos",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //8
        Option::create([
            "padre"=>"5",
            "nombre"=>"Unidades de medida",
            "ruta"=>"inventario/unimeds",
            "descripcion"=>"Administración de las unidades de medida",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //9
        Option::create([
            "nombre"=>"Compras",
            "descripcion"=>"",
            "icono_l"=>"fa-shopping-cart",
            "orden"=>"1",
        ]);

        //10
        Option::create([
            "padre"=>"9",
            "nombre"=>"Proveedores",
            "ruta"=>"compras/proveedores",
            "descripcion"=>"Administración de proveedores",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //11
        Option::create([
            "padre"=>"9",
            "nombre"=>"Ingresos",
            "ruta"=>"compras/ingreso",
            "descripcion"=>"Ingresos de artículos a inventario",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //12
        Option::create([
            "nombre"=>"Ventas",
            "descripcion"=>"",
            "icono_l"=>"fa-laptop",
            "orden"=>"1",
        ]);

        //13
        Option::create([
            "padre"=>"12",
            "nombre"=>"Ventas",
            "ruta"=>"ventas/ventas",
            "descripcion"=>"",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //14
        Option::create([
            "padre"=>"12",
            "nombre"=>"Clientes",
            "ruta"=>"ventas/clientes",
            "descripcion"=>"",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //15
        Option::create([
            "nombre"=>"Medicamentos",
            "descripcion"=>"",
            "icono_l"=>"fa-ambulance",
            "orden"=>"1",
        ]);

        //16
        Option::create([
            "padre"=>"15",
            "nombre"=>"Laboratorios",
            "ruta"=>"medicamentos/laboratorios",
            "descripcion"=>"",
            "orden"=>"1",
            "icono_r"=>""
        ]);

        //17
        Option::create([
            "padre"=>"15",
            "nombre"=>"Categorías",
            "ruta"=>"medicamentos/fcategorias",
            "descripcion"=>"",
            "orden"=>"2",
            "icono_r"=>""
        ]);

        //18
        Option::create([
            "padre"=>"15",
            "nombre"=>"Farmacos",
            "ruta"=>"medicamentos/farmacos",
            "descripcion"=>"",
            "orden"=>"3",
            "icono_r"=>""
        ]);

        //18
        Option::create([
            "padre"=>"15",
            "nombre"=>"Medicamentos",
            "ruta"=>"medicamentos/medicamentos",
            "descripcion"=>"",
            "orden"=>"4",
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
