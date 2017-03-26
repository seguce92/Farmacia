<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClasificacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clasificacions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('clasificacion_id')->nullable()->index('fk_clalsificacion_clalsificacion1_idx');
			$table->string('nombre', 45)->unique('descripcion_UNIQUE');
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
		Schema::drop('clasificacions');
	}

}
