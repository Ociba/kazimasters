<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_reports', function (Blueprint $table) {
            $table->id();
            $table->string('vcs_passport_payment');
            $table->string('gcc_payment');
            $table->string('visa_attachment');
            $table->string('ticket_copy');
            $table->string('passport_copy');
            $table->string('pcr_test_result');
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
        Schema::dropIfExists('other_reports');
    }
}
