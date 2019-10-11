<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->float('amount', 15, 2);
            $table->integer('estimate_id');
            $table->float('amount_paid', 15, 2)->default(0);
            $table->enum('status', ['paid', 'unpaid']);
            $table->integer('currency_id')->default(1);
            $table->string('filename')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
