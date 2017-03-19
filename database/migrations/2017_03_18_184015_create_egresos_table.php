<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEgresosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('egresos', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
		    $table->integer('venta_detalle_id')->index('fk_egresos_venta_detalles1_idx');
			$table->integer('lote_id')->index('fk_venta_has_lote_lote1_idx');
			$table->decimal('cantidad', 6)->nullable();
			$table->primary(['venta_detalle_id','lote_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('egresos');
	}

}
