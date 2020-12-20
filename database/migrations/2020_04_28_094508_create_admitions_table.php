<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('person_id')->references('id')->on('admitions');
            $table->dateTime('enterdate')->default(DB::raw('CURRENT_TIMESTAMP')) ;
            //
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('reseaon_id')->references('id')->on('reseaons');
            $table->integer('section_id')->references('id')->on('reseaons');
            $table->integer('insurance_id')->references('id')->on('insurances');
            $table->integer('cominsurance_id')->references('id')->on('cominsurances');
            //php artisan make:model Cominsurance -a

            $table->dateTime('exitdate')->nullable();
            $table->dateTime('dischargedate')->nullable();
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admitions');
    }
}
