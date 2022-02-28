<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->boolean('status')->default(0);
            $table->string('name')->nullable();
            $table->string('ic')->nullable();
            $table->date('date')->nullable();
            $table->string('contact')->nullable();
            $table->string('authorized')->nullable();
            $table->string('sellingprice')->nullable();
            $table->string('agencyfee')->nullable();
            $table->string('startdate')->nullable();
            $table->string('enddate')->nullable();
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
        Schema::dropIfExists('letters');
    }
}
