<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceComBimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_com_bims', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('service_id')->references('id')->on('services');
            $table->integer('insurance_id')->references('id')->on('insurances');
            $table->integer('insurance_percent');
            $table->integer('insurance_max');
            $table->dateTime('startdate')->default(DB::raw('CURRENT_TIMESTAMP')) ;
            $table->dateTime('enddate')->nullable() ;
            $table->integer('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_com_bims');
    }
}
