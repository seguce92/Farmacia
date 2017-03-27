<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureLogTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            create procedure log_triggers(name_trigger_in varchar(100),message_in varchar(255))
            begin
                INSERT INTO log_triggers(id, name_trigger, message, created_at) VALUES(0, name_trigger_in, message_in, CURRENT_TIMESTAMP);
            end;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP procedure log_triggers');
    }
}
