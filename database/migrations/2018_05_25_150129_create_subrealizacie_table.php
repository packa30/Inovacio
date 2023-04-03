<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubrealizacieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subrealizacie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('popis','256');
            $table->integer('poradie');
            $table->timestamps();
            $table->unsignedInteger('realizacie_id');
            $table->foreign('realizacie_id')->references('id')->on('realizacie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subrealizacie');
    }
}
