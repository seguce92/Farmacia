<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_compras', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('proveedore_id')->nullable()->index('fk_temp_compras_proveedores1_idx');
			$table->integer('tcomprobante_id')->nullable()->index('fk_temp_compras_tcomprobantes1_idx');
			$table->dateTime('fecha')->nullable();
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
		Schema::drop('temp_compras');
	}

}
