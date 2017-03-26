<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFarmacoMedicamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('farmaco_medicamento', function(Blueprint $table)
		{
			$table->integer('medicamento_id')->index('fk_medicamento_has_farmaco_medicamento1_idx');
			$table->integer('farmaco_id')->index('fk_medicamento_has_farmaco_farmaco1_idx');
			$table->integer('unimed_id')->index('fk_medicamento_has_farmaco_unidad_medida1_idx');
			$table->decimal('cantidad', 6);
			$table->primary(['medicamento_id','farmaco_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('farmaco_medicamento');
	}

}
