<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->longText('photo');
            $table->string('birthday');
            $table->string('gender');
            $table->string('blood_group');
            $table->string('present_address');
            $table->string('permanent_address');
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
        Schema::dropIfExists('employee_details');
    }
}
