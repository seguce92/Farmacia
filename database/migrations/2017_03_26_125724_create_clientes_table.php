<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('nit', 10)->nullable()->unique('clt_nit_UNIQUE');
			$table->string('nombres', 100);
			$table->string('apellidos', 100);
			$table->string('direccion')->nullable();
			$table->char('telefono', 8)->nullable();
			$table->string('email', 100)->nullable();
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
		Schema::drop('clientes');
	}

}
