<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compras', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('proveedor_id')->index('fk_compra_proveedores1_idx');
			$table->integer('tcomprobante_id')->index('fk_compras_tcomprobantes1_idx');
			$table->dateTime('fecha');
			$table->string('serie', 45);
			$table->string('numero', 45);
			$table->integer('cestado_id')->index('fk_compras_cestados1_idx');
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
		Schema::drop('compras');
	}

}
