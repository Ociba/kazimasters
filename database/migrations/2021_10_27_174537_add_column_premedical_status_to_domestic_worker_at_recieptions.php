<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPremedicalStatusToDomesticWorkerAtRecieptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domestic_worker_at_registras', function (Blueprint $table) {
            $table->enum('premedical_status',['pending','success'])->default('pending')->after('office_or_premedical_fee');
            $table->SoftDeletes();
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
            $table->enum('premedical_status',['pending','success'])->default('pending')->after('office_or_premedical_fee');
            $table->SoftDeletes();
        });
    }
}
