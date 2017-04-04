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
			$table->integer('id', true);
			$table->string('nombre', 100);
			$table->text('descripcion', 65535)->nullable();
			$table->decimal('precio', 6)->default(0.00);
			$table->decimal('precio_pro', 6)->nullable()->default(0.00);
			$table->string('imagen', 100)->nullable();
			$table->string('codigo', 25)->nullable();
			$table->decimal('stock', 6)->default(0.00);
			$table->integer('unimed_id')->index('fk_items_unimeds1_idx');
			$table->integer('iestado_id')->index('fk_items_iestados1_idx');
            $table->string('ubicacion', 45)->nullable();
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
