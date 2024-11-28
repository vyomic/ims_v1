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
        Schema::create('institute', function (Blueprint $table) {
            $table->id('institute_id')->primary();
            $table->string('inst_name');
            $table->string('inst_type');
            $table->string('inst_course')->nullable();
            $table->string('inst_spec')->nullable();
            $table->string('inst_affil')->nullable();
            $table->string('inst_email')->unique();
            $table->timestamp('inst_email_verified_at')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('website');
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('user_id')->nullable();

            $table->rememberToken();
            // $table->();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute');
    }
};
