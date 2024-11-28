<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Reverse the migrations.
     */

     // database/migrations/YYYY_MM_DD_HHMMSS_add_is_new_to_users_table.php

public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('isNew')->default('newAdmin'); // Add isNew column with default value 'newAdmin'
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('isNew');
    });
}

};
