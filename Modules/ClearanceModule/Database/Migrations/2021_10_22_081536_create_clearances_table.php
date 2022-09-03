<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            $table->enum('clearance_for_contract',['cleared','pending'])->default('pending');
            $table->enum('clearance_for_medical',['cleared','pending'])->default('pending');
            $table->enum('clearance_for_interpol',['cleared','pending'])->default('pending');
            $table->enum('passport_bio_data',['cleared','pending'])->default('pending');
            $table->enum('company_license',['cleared','pending'])->default('pending');
            $table->enum('bank_guarantee',['cleared','pending'])->default('pending');
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
        Schema::dropIfExists('clearances');
    }
}
