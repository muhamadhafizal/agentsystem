<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptbillionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiptbillions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('receiptnum')->nullable();
            $table->string('sst_no')->nullable();
            $table->date('date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('received_from')->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('being_payment')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('receiptbillions');
    }
}
