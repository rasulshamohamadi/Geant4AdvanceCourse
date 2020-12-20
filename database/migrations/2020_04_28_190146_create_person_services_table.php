<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('person_id')->references('id')->on('admitions');
            $table->integer('user_id')->references('id')->on('users');
            $table->dateTime('enterdate')->default(DB::raw('CURRENT_TIMESTAMP')) ;
            //
            $table->integer('service_id')->references('id')->on('services');
            $table->integer('servicetype_id');
            $table->integer('number');
            $table->integer('price');
            $table->integer('totalprice');
            $table->integer('insuranprice');
            $table->integer('cominsuranprice');
            $table->integer('patientprice');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_services');
    }
}
