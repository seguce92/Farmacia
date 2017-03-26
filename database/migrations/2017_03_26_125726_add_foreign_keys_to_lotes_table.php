<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lotes', function(Blueprint $table)
		{
			$table->foreign('item_id', 'fk_igresos_items1')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tienda_id', 'fk_lotes_tiendas1')->references('id')->on('tiendas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lotes', function(Blueprint $table)
		{
			$table->dropForeign('fk_igresos_items1');
			$table->dropForeign('fk_lotes_tiendas1');
		});
	}

}
