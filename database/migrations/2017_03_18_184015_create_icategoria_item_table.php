<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIcategoriaItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('icategoria_item', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
		    $table->integer('icategoria_id')->index('fk_icategorias_has_items_icategorias1_idx');
			$table->integer('item_id')->index('fk_icategorias_has_items_items1_idx');
			$table->primary(['icategoria_id','item_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('icategoria_item');
	}

}
