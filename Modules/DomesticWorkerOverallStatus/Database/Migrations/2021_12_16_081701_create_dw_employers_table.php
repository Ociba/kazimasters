<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDwEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dw_employers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domestic_worker_id');
            $table->string('visa');
            $table->foreignId('company_id');
            $table->string('employer_name');
            $table->string('employer_contact');
            $table->foreignId('created_by');
            $table->enum('status',['pending','travelled','did not','returned','renewed'])->default('pending');
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
        Schema::dropIfExists('dw_employers');
    }
}
