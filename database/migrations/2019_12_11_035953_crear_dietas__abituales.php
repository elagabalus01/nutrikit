<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDietasAbituales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietasHabituales', function (Blueprint $table){
            $table->increments('id');
            $table->integer('verduras');
            $table->integer('frutas');
            $table->integer('aoa');
            $table->integer('cereales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dietasHabituales');
    }
}

