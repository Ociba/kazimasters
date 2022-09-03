<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomesticWorkerAtRecieptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domestic_worker_at_recieptions', function (Blueprint $table) {
            $table->id();
            $table->string('dw_first_name');
            $table->string('dw_last_name');
            $table->string('dw_other_name')->nullable();
            $table->text('reason_for_coming');
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
        Schema::dropIfExists('domestic_worker_at_recieptions');
    }
}
