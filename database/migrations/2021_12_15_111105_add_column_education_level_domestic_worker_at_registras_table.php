<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEducationLevelDomesticWorkerAtRegistrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domestic_worker_at_registras', function (Blueprint $table) {
            $table->string('education_level')->after('nationa_id_number');
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
