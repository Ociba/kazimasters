<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAmountInWordsToDomesticWorkerAtRegistrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domestic_worker_at_registras', function (Blueprint $table) {
            $table->text('amount_in_words')->after('office_or_premedical_fee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domestic_worker_at_registras', function (Blueprint $table) {
            //
        });
    }
}
