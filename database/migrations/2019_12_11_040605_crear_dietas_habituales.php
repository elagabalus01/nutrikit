<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDietasHabituales extends Migration
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
            $table->integer('consulta_id')->unsigned();
            $table->integer('cereales')->unsigned();
            $table->integer('leguminosas')->unsigned();
            $table->integer('verduras')->unsigned();
            $table->integer('frutas')->unsigned();
            $table->integer('carnes')->unsigned();
            $table->integer('lacteos')->unsigned();
            $table->integer('grasas')->unsigned();
            $table->integer('azucares')->unsigned();

            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');
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

