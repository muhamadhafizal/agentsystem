<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherbillionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucherbillions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vouchernum');
            $table->string('pay_to')->nullable();
            $table->string('bank_details')->nullable();
            $table->string('nric')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->date('date')->nullable();   
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
        Schema::dropIfExists('voucherbillions');
    }
}
