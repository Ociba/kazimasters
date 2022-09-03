<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNokContactToDomesticWorkerAtRecieptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domestic_worker_at_recieptions', function (Blueprint $table) {
            $table->string('nok_contact')->after('next_of_kin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domestic_worker_at_recieptions', function (Blueprint $table) {
            //
        });
    }
}
