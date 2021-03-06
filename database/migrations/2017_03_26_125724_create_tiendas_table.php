<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiendasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tiendas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('admin')->nullable()->index('fk_tiendas_empleados1_idx');
			$table->string('nombre', 45);
			$table->string('direccion', 45)->nullable();
			$table->string('telefono', 45)->nullable();
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
		Schema::drop('tiendas');
	}

}
