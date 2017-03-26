<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTriggerVentaDetallesAFTERUPDATE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE DEFINER = CURRENT_USER TRIGGER `farmacia`.`venta_detalles_AFTER_UPDATE` AFTER UPDATE ON `venta_detalles` FOR EACH ROW
            BEGIN
            if new.deleted_at != null then
                update items set stock = stock + new.cantidad where items.id = new.item_id;
            end if;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `farmacia`.`venta_detalles_AFTER_UPDATE`');
    }
}
