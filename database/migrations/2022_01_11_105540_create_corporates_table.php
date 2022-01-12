<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporatesTable extends Migration
{
   
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('company_official_name',100);
            $table->string('tax_office_number',200);
            $table->string('real_estate_trade_authorization_number',200)->nullable();
            $table->string('company_website',200)->nullable();
            $table->string('company_logo',200)->nullable();
            $table->string('company_email',200);
            $table->string('address',200);
            $table->string('company_representative_name_and_surname',200);
            $table->string('phone_number',100);



            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('corporates');
    }
}
