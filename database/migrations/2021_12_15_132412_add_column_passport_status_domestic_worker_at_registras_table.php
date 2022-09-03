<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPassportStatusDomesticWorkerAtRegistrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domestic_worker_at_registras', function (Blueprint $table) {
            $table->enum('passport_status',['pending','successful'])->default('pending')->after('domestic_worker_at_recieptions_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domestic_worker_at_registras', function (Blueprint $table) {
            //
        });
    }
}
