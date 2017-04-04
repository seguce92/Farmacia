<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicamentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicamentos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('laboratotio_id')->index('fk_medicamento_laboratorio1_idx');
			$table->integer('clasificacion_id')->index('fk_medicamento_clalsificacion1_idx');
			$table->integer('unimed_id')->index('fk_medicamento_unidad_medida1_idx');
			$table->integer('item_id')->index('fk_medicamentos_items1_idx');
			$table->string('nombre', 45);
			$table->boolean('receta')->nullable()->default(0);
			$table->smallInteger('cnt_total')->nullable();
			$table->smallInteger('cnt_formula')->nullable();
			$table->text('indicaciones', 65535)->nullable();
			$table->text('dosis', 65535)->nullable();
			$table->text('contraindicaciones', 65535)->nullable();
			$table->text('advertencias', 65535)->nullable();
            $table->boolean('generico')->nullable()->default(0);
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
		Schema::drop('medicamentos');
	}

}
