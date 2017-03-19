<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEgresosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('egresos', function(Blueprint $table)
		{
			$table->foreign('venta_detalle_id', 'fk_egresos_venta_detalles1')->references('id')->on('venta_detalles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('lote_id', 'fk_venta_has_lote_lote1')->references('id')->on('lotes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('egresos', function(Blueprint $table)
		{
			$table->dropForeign('fk_egresos_venta_detalles1');
			$table->dropForeign('fk_venta_has_lote_lote1');
		});
	}

}
