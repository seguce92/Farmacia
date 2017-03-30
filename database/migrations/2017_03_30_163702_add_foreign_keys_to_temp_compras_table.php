<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTempComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('temp_compras', function(Blueprint $table)
		{
			$table->foreign('proveedore_id', 'fk_temp_compras_proveedores1')->references('id')->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tcomprobante_id', 'fk_temp_compras_tcomprobantes1')->references('id')->on('tcomprobantes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('temp_compras', function(Blueprint $table)
		{
			$table->dropForeign('fk_temp_compras_proveedores1');
			$table->dropForeign('fk_temp_compras_tcomprobantes1');
		});
	}

}
