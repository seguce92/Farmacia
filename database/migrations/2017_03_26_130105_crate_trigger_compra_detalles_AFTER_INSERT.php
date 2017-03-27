<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTriggerCompraDetallesAFTERINSERT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE DEFINER = CURRENT_USER TRIGGER `farmacia`.`compra_detalles_AFTER_INSERT` AFTER INSERT ON `compra_detalles` FOR EACH ROW
            BEGIN
                CALL log_triggers('compra_detalles_AFTER_INSERT',concat('se actualizo el stock del item:',new.item_id));           
                update items set stock = stock + new.cantidad where items.id = new.item_id;
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `farmacia`.`compra_detalles_AFTER_INSERT`');
    }
}
