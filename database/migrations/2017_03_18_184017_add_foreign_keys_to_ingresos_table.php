<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIngresosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ingresos', function(Blueprint $table)
		{
			$table->foreign('compra_detalle_id', 'fk_compra_detalles_has_lotes_compra_detalles1')->references('id')->on('compra_detalles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('lote_id', 'fk_compra_detalles_has_lotes_lotes1')->references('id')->on('lotes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ingresos', function(Blueprint $table)
		{
			$table->dropForeign('fk_compra_detalles_has_lotes_compra_detalles1');
			$table->dropForeign('fk_compra_detalles_has_lotes_lotes1');
		});
	}

}
