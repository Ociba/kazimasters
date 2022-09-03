<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessPassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_passports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domestic_worker_id');
            $table->string('particulars')->nullable();
            $table->string('amount');
            $table->string('remarks');
            $table->foreignId('created_by');
            $table->enum('status',['pending','received','others'])->default('pending');
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
        Schema::dropIfExists('process_passports');
    }
}
