<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOveralStatusToOtherReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('other_reports', function (Blueprint $table) {
            $table->enum('overal_status',['pending','successful'])->default('pending')->after('pcr_test_result');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('other_reports', function (Blueprint $table) {
            //
        });
    }
}
