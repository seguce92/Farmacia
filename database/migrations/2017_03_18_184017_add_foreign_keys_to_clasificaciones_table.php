<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClasificacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clasificaciones', function(Blueprint $table)
		{
			$table->foreign('clasificacion_id', 'fk_clalsificacion_clalsificacion1')->references('id')->on('clasificaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clasificaciones', function(Blueprint $table)
		{
			$table->dropForeign('fk_clalsificacion_clalsificacion1');
		});
	}

}
