<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpleadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empleados', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombres', 100);
			$table->string('apellidos', 100);
			$table->date('fecha_nac')->nullable();
			$table->binary('imagen', 16777215)->nullable();
			$table->text('direccion', 16777215)->nullable();
			$table->char('telefono', 8)->nullable();
			$table->integer('user_id')->nullable();
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
		Schema::drop('empleados');
	}

}
