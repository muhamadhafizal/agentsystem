<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewInputToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('bill_to')->nullable();
            $table->date('date')->nullable();
            $table->string('two_month_security')->nullable();
            $table->string('half_month_utility')->nullable();
            $table->string('one_month_advance')->nullable();
            $table->string('half_month_agent')->nullable();
            $table->string('agreement_stemping')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['bill_to','date','two_month_security','half_month_utility','one_month_advance','half_month_agent','agreement_stemping']);
        });
    }
}
