<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeIdToLeavesTable extends Migration
{
    public function up()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
        });
    }

    public function down()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn('employee_id');
        });
    }
}
