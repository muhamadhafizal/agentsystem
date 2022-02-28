<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewInputToReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->string('sst_no')->nullable();
            $table->date('date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('received_from')->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('being_payment')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn(['sst_no','date','payment_method','received_from','amount_paid','being_payment','address']);
        });
    }
}
