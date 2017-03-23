<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerUpdateStockCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            create trigger trUpdStockIngreso after insert on compra_detalles for each row
            Begin
                update items set stock = stock + new.cantidad where items.id = new.item_id;
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
        DB::unprepared('
            drop trigger trUpdStockIngreso;
        ');
    }
}
