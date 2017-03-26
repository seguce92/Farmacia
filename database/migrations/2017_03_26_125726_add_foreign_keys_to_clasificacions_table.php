<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClasificacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clasificacions', function(Blueprint $table)
		{
			$table->foreign('clasificacion_id', 'fk_clalsificacion_clalsificacion1')->references('id')->on('clasificacions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clasificacions', function(Blueprint $table)
		{
			$table->dropForeign('fk_clalsificacion_clalsificacion1');
		});
	}

}
