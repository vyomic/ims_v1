<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary key for the teachers table
            $table->string('first_name'); // First name of the teacher
            $table->string('last_name');  // Last name of the teacher
            $table->string('father_name'); // Father's name
            $table->string('mother_name'); // Father's name
            $table->date('dob'); // Date of birth
            $table->string('photo'); // image path
            $table->string('phone'); // Phone number
            $table->string('email')->unique(); // Email address
            $table->text('address'); // Address
            $table->string('class'); // Maximum qualification
            $table->date('admit'); // Date of joining (DOJ)
            $table->string('cls_teacher'); // Subject taught
            $table->unsignedBigInteger('institute_id'); // Foreign key to the institute
            $table->unsignedBigInteger('add_by'); // Who added the teacher (foreign key, assuming users table)
            $table->string('presence'); // Class assigned to the teacher
            $table->string('leave'); // Class assigned to the teacher
            $table->timestamps(); // Created at and Updated at timestamps

          
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};


