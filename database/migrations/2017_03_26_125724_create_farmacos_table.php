<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFarmacosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('farmacos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('fcategoria_id')->index('fk_farmaco_categoria_terapeutica1_idx');
			$table->string('nombre', 45);
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
		Schema::drop('farmacos');
	}

}
