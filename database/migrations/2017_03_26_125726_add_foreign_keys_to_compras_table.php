<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('compras', function(Blueprint $table)
		{
			$table->foreign('proveedor_id', 'fk_compra_proveedores1')->references('id')->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('cestado_id', 'fk_compras_cestados1')->references('id')->on('cestados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tcomprobante_id', 'fk_compras_tcomprobantes1')->references('id')->on('tcomprobantes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('compras', function(Blueprint $table)
		{
			$table->dropForeign('fk_compra_proveedores1');
			$table->dropForeign('fk_compras_cestados1');
			$table->dropForeign('fk_compras_tcomprobantes1');
		});
	}

}
