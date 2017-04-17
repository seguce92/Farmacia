<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ventas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cliente_id')->nullable()->index('fk_venta_cliente1_idx');
			$table->date('fecha');
			$table->string('serie', 45)->nullable();
			$table->string('numero', 45)->nullable();
			$table->integer('vestado_id')->index('fk_ventas_estado_venta1_idx');
			$table->decimal('recibido');
			$table->integer('user_id');
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
		Schema::drop('ventas');
	}

}
