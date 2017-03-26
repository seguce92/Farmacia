<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFarmacosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('farmacos', function(Blueprint $table)
		{
			$table->foreign('fcategoria_id', 'fk_farmaco_categoria_terapeutica1')->references('id')->on('fcategorias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('farmacos', function(Blueprint $table)
		{
			$table->dropForeign('fk_farmaco_categoria_terapeutica1');
		});
	}

}
