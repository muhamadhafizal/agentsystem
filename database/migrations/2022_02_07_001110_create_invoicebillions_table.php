<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicebillionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicebillions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoicenum');
            $table->string('bill_to')->nullable();
            $table->date('date')->nullable();
            $table->string('two_month_security')->nullable();
            $table->string('half_month_utility')->nullable();
            $table->string('one_month_advance')->nullable();
            $table->string('half_month_agent')->nullable();
            $table->string('agreement_stemping')->nullable();
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
        Schema::dropIfExists('invoicebillions');
    }
}
