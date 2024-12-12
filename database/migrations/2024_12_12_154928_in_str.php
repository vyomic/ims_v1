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
        Schema::create('inStr', function (Blueprint $table){
            $table-> id();
            $table-> string('depName');
            $table-> string('depType');
            $table-> string('depHead');
            $table-> string('depCode');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inStr');
    }
};
