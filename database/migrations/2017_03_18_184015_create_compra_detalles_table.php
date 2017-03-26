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
            $table->engine = 'InnoDB';
		    $table->integer('id', true);
			$table->integer('compra_id')->index('fk_compra_detalles_compra1_idx');
			$table->integer('items_id')->index('fk_compra_detalles_items1_idx');
			$table->smallInteger('cantidad');
			$table->decimal('precio', 11);
			$table->decimal('descuento', 11)->nullable()->default(0);
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
