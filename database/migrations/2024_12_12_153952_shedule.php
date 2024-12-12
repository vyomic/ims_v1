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
        Schema::create('shedule', function (Blueprint $table) {
            $table->id(); // Primary key for the teachers table
            $table->string('slot'); // First name of the teacher
            $table->string('subject');  // Last name of the teacher
            $table->string('class'); // Father's name
            $table->string('teacher'); // Date of birth
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shedule');
    }
};
