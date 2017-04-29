<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMedicamentoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create OR REPLACE VIEW item_medicamentos as 
            (
                select 
                    i.id,i.nombre,i.descripcion,i.precio,i.precio_pro,i.imagen,i.codigo,i.stock,i.ubicacion
                    ,u.nombre unimed
                    ,l.nombre laboratorio
                    ,c.nombre clasificacion
                    ,m.generico ,m.receta ,m.cnt_total ,m.cnt_formula ,m.indicaciones ,m.dosis ,m.contraindicaciones ,m.advertencias ,m.contiene
                    ,ie.descripcion estado
                from 
                    items i left join medicamentos m on i.id=m.item_id 
                    left join laboratorios l on l.id = m.laboratorio_id 
                    left join clasificacions c on c.id = m.clasificacion_id
                    left join unimeds u on u.id= i.unimed_id
                    left join iestados ie on ie.id = i.iestado_id 
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS item_medicamentos');
    }
}
