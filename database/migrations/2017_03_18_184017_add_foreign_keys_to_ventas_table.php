<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ventas', function(Blueprint $table)
		{
			$table->foreign('cliente_id', 'fk_venta_cliente1')->references('id')->on('clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vestado_id', 'fk_ventas_estado_venta1')->references('id')->on('vestados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ventas', function(Blueprint $table)
		{
			$table->dropForeign('fk_venta_cliente1');
			$table->dropForeign('fk_ventas_estado_venta1');
		});
	}

}
