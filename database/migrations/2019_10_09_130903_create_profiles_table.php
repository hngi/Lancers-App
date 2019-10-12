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
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->text('company_address')->nullable();
            $table->string('phone')->nullable();
            $table->text('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('country_id')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('timezone')->nullable();
            $table->json('contacts')->nullable();
            $table->integer('currency_id')->default(1);
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
