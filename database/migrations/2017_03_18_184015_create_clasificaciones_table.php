<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClasificacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clasificaciones', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            $table->integer('id', true);
			$table->integer('clasificacion_id')->nullable()->index('fk_clalsificacion_clalsificacion1_idx');
			$table->string('descripcion', 45)->unique('descripcion_UNIQUE');
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
		Schema::drop('clasificaciones');
	}

}
