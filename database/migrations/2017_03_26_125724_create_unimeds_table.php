<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnimedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unimeds', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 45)->unique('descripcion_UNIQUE');
			$table->char('simbolo', 4)->nullable();
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
		Schema::drop('unimeds');
	}

}
