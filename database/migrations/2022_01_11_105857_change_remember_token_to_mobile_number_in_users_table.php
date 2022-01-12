<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRememberTokenToMobileNumberInUsersTable extends Migration
{
   
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('remember_token', 'username');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_number')->after('email')->nullable();
        });
    }

   
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('username', 'remember_token');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile_number');
        });
    }
}
