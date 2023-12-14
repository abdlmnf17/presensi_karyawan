<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration

{
    /**
     * Run the migrations.
     */

     public function up()
     {
         Schema::table('users', function (Blueprint $table) {
             $table->string('role')->default('karyawan'); // Default role adalah 'karyawan'
         });
     }

     public function down()
     {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('role');
         });
     }

};
