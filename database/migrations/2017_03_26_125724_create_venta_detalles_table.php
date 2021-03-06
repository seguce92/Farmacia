<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentaDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venta_detalles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('venta_id')->index('fk_venta_detalle_venta1_idx');
			$table->integer('item_id')->index('fk_venta_detalles_items1_idx');
			$table->decimal('cantidad', 6)->default(0.00);
			$table->decimal('precio', 6)->default(0.00);
			$table->decimal('descuento', 6)->nullable()->default(0.00);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venta_detalles');
	}

}
