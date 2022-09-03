<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerTrainingSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_training_schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_school_id');
            $table->foreignId('domestic_worker_id');
            $table->foreignId('created_by');
            $table->string('date_of_allocation');
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
        Schema::dropIfExists('worker_training_schools');
    }
}
