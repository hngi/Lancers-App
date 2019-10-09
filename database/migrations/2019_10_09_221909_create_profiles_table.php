<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('profile_picture');
            $table->string('company_name');
            $table->string('company_email');
            $table->text('compny_address');
            $table->string('phone');
            $table->text('street');
            $table->string('street_number');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('country');
            $table->string('city');
            $table->string('zip_code', 45);
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('state');
            $table->string('timezone');
            $table->json('contacts');
            $table->integer('currency_id')->unsigned();
            $table->foreign('currency_id')->references('id')->on('currency');
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
        Schema::dropIfExists('profiles');
    }
}
