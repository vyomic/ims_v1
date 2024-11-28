<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teacher extends Migration
{
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id(); // Primary key for the teachers table
            $table->string('first_name'); // First name of the teacher
            $table->string('last_name');  // Last name of the teacher
            $table->string('father_name'); // Father's name
            $table->date('dob'); // Date of birth
            $table->string('phone'); // Phone number
            $table->string('email')->unique(); // Email address
            $table->text('address'); // Address
            $table->string('max_qualification'); // Maximum qualification
            $table->date('doj'); // Date of joining (DOJ)
            $table->string('subject'); // Subject taught
            $table->unsignedBigInteger('institute_id'); // Foreign key to the institute
            $table->unsignedBigInteger('add_by'); // Who added the teacher (foreign key, assuming users table)
            $table->string('experience'); // Class assigned to the teacher
            $table->string('last_employe'); // Class assigned to the teacher
            $table->string('class'); // Class assigned to the teacher
            $table->string('schedule'); // Teacher's schedule
            $table->timestamps(); // Created at and Updated at timestamps

          
        });
    }

    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}


