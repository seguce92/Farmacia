<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_ventas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cliente_id')->nullable()->index('fk_temp_ventas_clientes1_idx');
			$table->date('fecha')->nullable();
			$table->string('serie', 45)->nullable();
			$table->string('numero', 45)->nullable();
			$table->boolean('procesada')->nullable()->default(0);
			$table->integer('user_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('temp_ventas');
	}

}
