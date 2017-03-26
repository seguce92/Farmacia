<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTriggerVentaDetallesAFTERINSERT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE DEFINER = CURRENT_USER TRIGGER `farmacia`.`venta_detalles_AFTER_INSERT` AFTER INSERT ON `venta_detalles` FOR EACH ROW
            BEGIN
                update items set stock = stock - new.cantidad where items.id = new.item_id;
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
        DB::unprepared('DROP TRIGGER `farmacia`.`venta_detalles_AFTER_INSERT`');
    }
}
