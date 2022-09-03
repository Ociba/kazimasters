<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCreatedByToDomesticWorkerAtRecieptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domestic_worker_at_recieptions', function (Blueprint $table) {
            $table->foreignId('created_by')->after('id');
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
