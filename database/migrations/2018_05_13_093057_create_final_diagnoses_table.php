<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_diagnoses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->date('dateOfTreatment');
            $table->string('finalDiagnosis');
            $table->boolean('firstTimeDiagnosed');
            $table->boolean('firstTimeDiagnosedOnProphylaxis');
            //TODO Field 'doctor' must references on doctor id
            $table->string('doctor');
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
        Schema::dropIfExists('final_diagnoses');
    }
}
