<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompraDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compra_detalles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('compra_id')->index('fk_compra_detalles_compra1_idx');
			$table->integer('item_id')->index('fk_compra_detalles_items1_idx');
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
		Schema::drop('compra_detalles');
	}

}
