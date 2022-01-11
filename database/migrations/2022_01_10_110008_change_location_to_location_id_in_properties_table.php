<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLocationToLocationIdInPropertiesTable extends Migration
{
  
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->renameColumn('location', 'location_id');
        });
    }

   
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->renameColumn('location_id', 'location');
        });
    }
}
