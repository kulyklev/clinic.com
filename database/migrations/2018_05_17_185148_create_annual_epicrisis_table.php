<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnualEpicrisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_epicrisis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->date('epicrisisDate');
            $table->string('causeOfObservation');
            $table->string('mainDiagnosis');
            $table->string('concomitantDiagnoses');
            $table->smallInteger('numberOfAggravations');
            $table->string('carryingOutTreatment');
            $table->string('disabilityGroup');
            $table->string('sanatoriumAndSpaTreatment');
            $table->foreign('patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('annual_epicrisis');
    }
}
