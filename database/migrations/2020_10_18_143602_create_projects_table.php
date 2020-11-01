<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('unit')->nullable();
            $table->string('purchaser')->nullable();
            $table->integer('agentone')->nullable();
            $table->integer('agentwo')->nullable();
            $table->integer('agentthree')->nullable();
            $table->integer('agentfour')->nullable();
            $table->text('spaprice')->nullable();
            $table->float('netselling')->nullable();
            $table->float('percentcomm')->nullable();
            $table->float('netcomm')->nullable();
            $table->float('commperperson')->nullable();
            $table->float('percentpoolfund')->nullable();
            $table->float('poolfundcomm')->nullable();
            $table->integer('leaderone')->nullable();
            $table->integer('leadertwo')->nullable();
            $table->integer('leaderthree')->nullable();
            $table->integer('leaderfour')->nullable();
            $table->float('leadercomm')->nullable();
            $table->float('percentcompany')->nullable();
            $table->float('companycomm')->nullable();
            $table->float('theroofcomm')->nullable();
            $table->float('tieringdiff')->nullable();
            $table->text('status')->nullable();
            $table->float('sst')->nullable();
            $table->float('commpersondeductsst')->nullable();

            $table->text('agentnameone')->nullable();
            $table->integer('agentidone')->nullable();
            $table->float('agentcommone')->nullable();
            $table->integer('ipidone')->nullable();
            $table->text('ipnameone')->nullable();
            $table->float('ipcommone')->nullable();
            $table->integer('goponeidone')->nullable();
            $table->text('goponenameone')->nullable();
            $table->float('goponecommone')->nullable();
            $table->integer('goptwoidone')->nullable();
            $table->text('goptwonameone')->nullable();
            $table->float('goptwocommone')->nullable();
            $table->integer('leadidone')->nullable();
            $table->text('leadnameone')->nullable();
            $table->float('leadcommone')->nullable();
            $table->integer('preleadidone')->nullable();
            $table->text('preleadnameone')->nullable();
            $table->float('preleadcommone')->nullable();
            $table->float('totalone')->nullable();

            $table->text('agentnametwo')->nullable();
            $table->integer('agentidtwo')->nullable();
            $table->float('agentcommtwo')->nullable();
            $table->integer('ipidtwo')->nullable();
            $table->text('ipnametwo')->nullable();
            $table->float('ipcommtwo')->nullable();
            $table->integer('goponeidtwo')->nullable();
            $table->text('goponenametwo')->nullable();
            $table->float('goponecommtwo')->nullable();
            $table->integer('goptwoidtwo')->nullable();
            $table->text('goptwonametwo')->nullable();
            $table->float('goptwocommtwo')->nullable();
            $table->integer('leadidtwo')->nullable();
            $table->text('leadnametwo')->nullable();
            $table->float('leadcommtwo')->nullable();
            $table->integer('preleadidtwo')->nullable();
            $table->text('preleadnametwo')->nullable();
            $table->float('preleadcommtwo')->nullable();
            $table->float('totaltwo')->nullable();

            $table->text('agentnamethree')->nullable();
            $table->integer('agentidthree')->nullable();
            $table->float('agentcommthree')->nullable();
            $table->integer('ipidthree')->nullable();
            $table->text('ipnamethree')->nullable();
            $table->float('ipcommthree')->nullable();
            $table->integer('goponeidthree')->nullable();
            $table->text('goponenamethree')->nullable();
            $table->float('goponecommthree')->nullable();
            $table->integer('goptwoidthree')->nullable();
            $table->text('goptwonamethree')->nullable();
            $table->float('goptwocommthree')->nullable();
            $table->integer('leadidthree')->nullable();
            $table->text('leadnamethree')->nullable();
            $table->float('leadcommthree')->nullable();
            $table->integer('preleadidthree')->nullable();
            $table->text('preleadnamethree')->nullable();
            $table->float('preleadcommthree')->nullable();
            $table->float('totalthree')->nullable();

            $table->text('agentnamefour')->nullable();
            $table->integer('agentidfour')->nullable();
            $table->float('agentcommfour')->nullable();
            $table->integer('ipidfour')->nullable();
            $table->text('ipnamefour')->nullable();
            $table->float('ipcommfour')->nullable();
            $table->integer('goponeidfour')->nullable();
            $table->text('goponenamefour')->nullable();
            $table->float('goponecommfour')->nullable();
            $table->integer('goptwoidfour')->nullable();
            $table->text('goptwonamefour')->nullable();
            $table->float('goptwocommfour')->nullable();
            $table->integer('leadidfour')->nullable();
            $table->text('leadnamefour')->nullable();
            $table->float('leadcommfour')->nullable();
            $table->integer('preleadidfour')->nullable();
            $table->text('preleadnamefour')->nullable();
            $table->float('preleadcommfour')->nullable();
            $table->float('totalfour')->nullable();            
            
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
        Schema::dropIfExists('projects');
    }
}
