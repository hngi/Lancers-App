<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_new', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('transaction_ref')->unique();
            $table->decimal('amount');
            $table->string('customer_email');
            $table->string('country');
            $table->string('currency');
            $table->string('narration');
            $table->string('phone_number');
            $table->string('payment_method');
            $table->string('created_by')->nullable();
            $table->string('update_by')->nullable();
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
        Schema::dropIfExists('transactions_new');
    }
}
