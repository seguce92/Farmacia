<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFarmacoMedicamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('farmaco_medicamento', function(Blueprint $table)
		{
			$table->foreign('farmaco_id', 'fk_medicamento_has_farmaco_farmaco1')->references('id')->on('farmacos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('medicamento_id', 'fk_medicamento_has_farmaco_medicamento1')->references('id')->on('medicamentos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('unimed_id', 'fk_medicamento_has_farmaco_unidad_medida1')->references('id')->on('unimeds')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('farmaco_medicamento', function(Blueprint $table)
		{
			$table->dropForeign('fk_medicamento_has_farmaco_farmaco1');
			$table->dropForeign('fk_medicamento_has_farmaco_medicamento1');
			$table->dropForeign('fk_medicamento_has_farmaco_unidad_medida1');
		});
	}

}
