<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 300);
            $table->string('slug');
            $table->string('description', 400)->nullable();
            $table->string('content')->nullable();
            $table->string('location')->nullable();
            $table->unsignedInteger('number_bedroom')->nullable();
            $table->unsignedInteger('number_bathrooms')->nullable();
            $table->unsignedInteger('number_floor')->nullable();
            $table->unsignedInteger('square')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('period', 30)->default('month');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('moderation_status')->default('pending');
            $table->date('expire_date')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedInteger('type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
