<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('client');
            $table->integer('estimate_id')->unsigned();
            $table->foreign('estimate_id')->references('id')->on('estimate');
            $table->string('track_code');
            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoice');
            $table->integer('proposal_id');
            $table->integer('progress');
            $table->enum('status', array('pending','in-progress','completed'));
            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contract');
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
        Schema::dropIfExists('projects');
    }
}
