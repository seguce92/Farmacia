<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
		    $table->integer('id', true);
			$table->string('nombre', 45);
			$table->text('descripcion', 65535)->nullable();
			$table->decimal('precio', 6);
			$table->string('imagen')->nullable();
			$table->string('codigo', 25)->nullable();
			$table->integer('unimed_id')->index('fk_items_unimeds1_idx');
			$table->decimal('precio_pro', 6)->nullable();
			$table->integer('iestado_id')->index('fk_items_iestados1_idx');
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
		Schema::drop('items');
	}

}
