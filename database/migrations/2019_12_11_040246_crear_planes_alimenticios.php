<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPlanesAlimenticios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planesAlimenticios', function (Blueprint $table){
            $table->increments('id');
            $table->smallInteger('consulta_id')->unsigned();
            $table->smallInteger('cereales')->unsigned();
            $table->smallInteger('leguminosas')->unsigned();
            $table->smallInteger('verduras')->unsigned();
            $table->smallInteger('frutas')->unsigned();
            $table->smallInteger('carnes')->unsigned();
            $table->smallInteger('lacteos')->unsigned();
            $table->smallInteger('grasas')->unsigned();
            $table->smallInteger('azucares')->unsigned();

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
        Schema::dropIfExists('planesAlimenticios');
    }
}
