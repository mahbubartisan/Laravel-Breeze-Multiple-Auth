<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAttendences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_attendences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('attendence_date');
            $table->string('attendence_time');
            $table->string('in_time');
            $table->string('out_time')->nullable();
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
        Schema::dropIfExists('employee_attendences');
    }
}
