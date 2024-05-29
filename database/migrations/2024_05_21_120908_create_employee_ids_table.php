<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeIdsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_ids', function (Blueprint $table) {
            $table->increments('id'); // Ensure id is auto-increment
            $table->string('employee_no');
            $table->unsignedInteger('emp_id');
            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_ids');
    }
}

