<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempCompraDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_compra_detalles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('temp_compra_id')->index('fk_temp_compra_detalles_temp_compras1_idx');
			$table->integer('item_id')->index('fk_temp_compra_detalles_items1_idx');
			$table->decimal('cantidad', 6)->default(0.00);
			$table->decimal('precio', 6)->default(0.00);
			$table->decimal('descuento', 6)->nullable()->default(0.00);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('temp_compra_detalles');
	}

}
