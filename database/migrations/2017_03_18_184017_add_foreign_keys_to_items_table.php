<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('items', function(Blueprint $table)
		{
			$table->foreign('iestado_id', 'fk_items_iestados1')->references('id')->on('iestados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('unimed_id', 'fk_items_unimeds1')->references('id')->on('unimeds')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('items', function(Blueprint $table)
		{
			$table->dropForeign('fk_items_iestados1');
			$table->dropForeign('fk_items_unimeds1');
		});
	}

}
