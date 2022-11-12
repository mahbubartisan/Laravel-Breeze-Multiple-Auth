<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('contact_name');
            $table->string('relationship');
            $table->string('address');
            $table->string('primary_contact_number');
            $table->string('secondary_contact_number')->nullable();
            $table->string('primary_email_address');
            $table->string('secondary_email_address')->nullable();
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
        Schema::dropIfExists('employee_contacts');
    }
}
