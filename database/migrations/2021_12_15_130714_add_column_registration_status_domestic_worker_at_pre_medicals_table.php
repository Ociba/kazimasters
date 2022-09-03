<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRegistrationStatusDomesticWorkerAtPreMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domestic_worker_at_pre_medicals', function (Blueprint $table) {
            $table->enum('registration_status',['pending','successful'])->default('pending')->after('premedical_report');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domestic_worker_at_pre_medicals', function (Blueprint $table) {
            //
        });
    }
}
