<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinationDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->string('vaccinationName');
            $table->enum('vaccinationType', array('vaccination', 'revaccination'));
            $table->date('vaccinationDate');
            $table->smallInteger('age');
            $table->smallInteger('dose');
            $table->string('series');
            $table->string('nameOfTheDrug');
            $table->string('methodOfInput');
            $table->string('localReaction');
            $table->string('globalReaction');
            $table->string('medicalContraindications');
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
        Schema::dropIfExists('vaccination_datas');
    }
}
