<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->enum('gender', array('male', 'female'));
            $table->date('bdate');
            $table->string('homePhoneNumber');
            $table->string('workPhoneNumber');
            $table->string('address');
            $table->string('placeOfWorkAndPosition');//TODO Split into place of work and position
            $table->boolean('dispensaryGroup');
            $table->string('contingent')->nullable();
            $table->string('PrivilegeCertificateID')->nullable();
            $table->enum('bloodType', array(1, 2, 3, 4))->nullable();
            $table->boolean('rh')->nullable();
            $table->string('diabetes')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE patients ADD FULLTEXT fulltext_index (name, surname, patronymic)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
