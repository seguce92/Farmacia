<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTempVentaDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('temp_venta_detalles', function(Blueprint $table)
		{
			$table->foreign('item_id', 'fk_temp_venta_detalles_items1')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('temp_venta_id', 'fk_temp_venta_detalles_temp_ventas1')->references('id')->on('temp_ventas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('temp_venta_detalles', function(Blueprint $table)
		{
			$table->dropForeign('fk_temp_venta_detalles_items1');
			$table->dropForeign('fk_temp_venta_detalles_temp_ventas1');
		});
	}

}
