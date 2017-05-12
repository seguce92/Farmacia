<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasVista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create or replace view vista_ventas as
            select 
                v.id
                ,concat(c.nit,' ',c.nombres,' ',c.apellidos) as cliente
                ,concat(v.serie,' ',v.numero) as ns
                ,DATE_FORMAT(v.fecha,'%d/%m/%Y') as fecha
                ,time(v.created_at) as hora
                ,s.descripcion as estado
                ,u.name as usuario
            from 
                ventas v inner join vestados s on v.vestado_id=s.id
                inner join users u on v.user_id= u.id
                inner join clientes c on c.id= v.cliente_id
            order by
                v.created_at desc
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vista_ventas');
    }
}
