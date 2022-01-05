<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionThroatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_throats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_inspection_id');
            $table->foreign('person_inspection_id')->references('id')->on('person_inspections');
            $table->unsignedBigInteger('throat_id');
            $table->foreign('throat_id')->references('id')->on('throats');
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
        Schema::dropIfExists('inspection_throats');
    }
}
