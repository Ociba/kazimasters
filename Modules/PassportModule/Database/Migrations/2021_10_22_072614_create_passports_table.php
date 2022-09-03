<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->string('dw_nin');
            $table->string('parent_nin');
            $table->string('nok_nin');
            $table->string('recommenders_nin');
            $table->string('domestic_worker_id');
            $table->string('dw_cv')->nullable()->comment = 'The domestic worker attaches the cv as they go for training';
            $table->string('passport')->nullable();
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
        Schema::dropIfExists('passports');
    }
}
