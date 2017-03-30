<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTempVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('temp_ventas', function(Blueprint $table)
		{
			$table->foreign('cliente_id', 'fk_temp_ventas_clientes1')->references('id')->on('clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('temp_ventas', function(Blueprint $table)
		{
			$table->dropForeign('fk_temp_ventas_clientes1');
		});
	}

}
