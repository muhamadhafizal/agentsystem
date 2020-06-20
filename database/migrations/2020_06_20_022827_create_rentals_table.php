<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num')->nullable();
            $table->string('date')->nullable();
            $table->integer('area')->nullable();
            $table->string('category')->nullable();
            $table->string('tenantname')->nullable();
            $table->string('tenantemail')->nullable();
            $table->string('tenantcontact')->nullable();
            $table->string('fee')->nullable();
            $table->integer('agent')->nullable();
            $table->string('status')->nullable();
            $table->double('percentsst')->nullable();
            $table->double('percentagent')->nullable();
            $table->double('percentlead')->nullable();
            $table->double('percentprelead')->nullable();
            $table->double('percentip')->nullable();
            $table->double('percentgopone')->nullable();
            $table->double('percentgoptwo')->nullabale();
            $table->double('total')->nullable();
            $table->double('profitcompany')->nullable();
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
        Schema::dropIfExists('rentals');
    }
}
