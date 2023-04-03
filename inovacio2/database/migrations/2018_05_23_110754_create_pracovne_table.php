<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracovneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pracovne', function (Blueprint $table) {
          $table->increments('id');
          $table->string('popis','256');
          $table->string('date','4');
          $table->integer('poradie');
          $table->string('obr1','256');
          $table->string('obr2','256');
          $table->string('opis','256');
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
        Schema::dropIfExists('pracovne');
    }
}
