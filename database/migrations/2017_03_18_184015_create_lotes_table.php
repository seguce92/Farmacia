<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lotes', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
		    $table->integer('id')->primary();
			$table->integer('tienda_id')->index('fk_lotes_tiendas1_idx');
			$table->integer('item_id')->index('fk_igresos_items1_idx');
			$table->string('numero', 25)->nullable();
			$table->timestamp('fecha_ing')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('fecha_ven');
			$table->smallInteger('cantidad');
			$table->smallInteger('cnt_ini');
			$table->smallInteger('orden_salida')->nullable()->default(0);
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
		Schema::drop('lotes');
	}

}
