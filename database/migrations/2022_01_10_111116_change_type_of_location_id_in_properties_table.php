<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeOfLocationIdInPropertiesTable extends Migration
{

    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedInteger('location_id')->change()->nullable();
        });
    }

 
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('location_id')->change()->nullable();
        });
    }
}
