<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrazkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obrazky', function (Blueprint $table) {
            $table->increments('id');
            $table->string('obr','256');
            $table->integer('poradie');
            $table->timestamps();
            $table->unsignedInteger('subrealizacie_id');
            $table->foreign('subrealizacie_id')->references('id')->on('subrealizacie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obrazky');
    }
}
