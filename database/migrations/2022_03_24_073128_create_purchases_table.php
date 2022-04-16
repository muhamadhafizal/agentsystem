<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->date('date_offer')->nullable();
            $table->string('sales_property')->nullable();
            $table->string('deposit')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('condition_one')->nullable();
            $table->string('condition_two')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('vendor_ic')->nullable();
            $table->string('purchaser_name')->nullable();
            $table->string('purchaser_ic')->nullable();
            $table->string('agentvendor_id')->nullable();
            $table->string('agentvendor_others')->nullable();
            $table->string('agenttenant_id')->nullable();
            $table->string('agenttenant_others')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
