<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMedicamentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('medicamentos', function(Blueprint $table)
		{
			$table->foreign('clasificacion_id', 'fk_medicamento_clalsificacion1')->references('id')->on('clasificaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('laboratotio_id', 'fk_medicamento_laboratorio1')->references('id')->on('laboratorios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('unimed_id', 'fk_medicamento_unidad_medida1')->references('id')->on('unimeds')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('item_id', 'fk_medicamentos_items1')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('medicamentos', function(Blueprint $table)
		{
			$table->dropForeign('fk_medicamento_clalsificacion1');
			$table->dropForeign('fk_medicamento_laboratorio1');
			$table->dropForeign('fk_medicamento_unidad_medida1');
			$table->dropForeign('fk_medicamentos_items1');
		});
	}

}
