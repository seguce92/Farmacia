<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTiendasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tiendas', function(Blueprint $table)
		{
			$table->foreign('admin', 'fk_tiendas_empleados1')->references('id')->on('empleados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tiendas', function(Blueprint $table)
		{
			$table->dropForeign('fk_tiendas_empleados1');
		});
	}

}
