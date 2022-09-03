<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomesticWorkerAtPreMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domestic_worker_at_pre_medicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domestic_worker_at_registra_id');
            $table->string('premedical_report');
            $table->string('issuing_officer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domestic_worker_at_pre_medicals');
    }
}
