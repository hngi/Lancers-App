<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('user_id');
            $table->string('company_name');
            $table->text('company_address');
            $table->string('company_email');
            $table->string('profile_picture');
            $table->string('email');
            $table->string('phone');
            $table->text('street');
            $table->string('street_number');
            $table->integer('country_id');
            $table->string('city');
            $table->string('zipcode');
            $table->integer('state_id');
            $table->string('time_zone');
            $table->json('contacts');
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
        Schema::dropIfExists('clients');
    }
}
