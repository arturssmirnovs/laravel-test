<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionNasalBreathingThroughtNosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_nasal_breathing_throught_noses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_inspection_id');
            $table->foreign('person_inspection_id', 'person_inspection_id')->references('id')->on('person_inspections');
            $table->unsignedBigInteger('nasal_breathing_throught_nose_id');
            $table->foreign('nasal_breathing_throught_nose_id', 'nasal_breathing_throught_nose_id')->references('id')->on('nasal_breathing_throught_noses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspection_nasal_breathing_throught_noses');
    }
}
