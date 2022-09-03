<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomesticWorkerAtRegistrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domestic_worker_at_registras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('domestic_worker_at_recieptions_id');
            $table->string('nationa_id_number');
            $table->string('desired_job');
            $table->string('parent_names');
            $table->string('office_or_premedical_fee');
            $table->softDeletes();
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
        Schema::dropIfExists('domestic_worker_at_registras');
    }
}
