<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIngresosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ingresos', function(Blueprint $table)
		{
			$table->integer('compra_detalle_id')->index('fk_compra_detalles_has_lotes_compra_detalles1_idx');
			$table->integer('lote_id')->index('fk_compra_detalles_has_lotes_lotes1_idx');
			$table->decimal('cantidad', 6)->nullable();
			$table->primary(['compra_detalle_id','lote_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ingresos');
	}

}
