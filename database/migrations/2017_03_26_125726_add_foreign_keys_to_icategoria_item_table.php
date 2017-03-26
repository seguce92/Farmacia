<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIcategoriaItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('icategoria_item', function(Blueprint $table)
		{
			$table->foreign('icategoria_id', 'fk_icategorias_has_items_icategorias1')->references('id')->on('icategorias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('item_id', 'fk_icategorias_has_items_items1')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('icategoria_item', function(Blueprint $table)
		{
			$table->dropForeign('fk_icategorias_has_items_icategorias1');
			$table->dropForeign('fk_icategorias_has_items_items1');
		});
	}

}
