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
            $table->integer('cereales');
            $table->integer('leguminosas');
            $table->integer('verdura');
            $table->integer('frutas');
            $table->integer('carne');
            $table->integer('leche');
            $table->integer('grasas');
            $table->integer('azucares');
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
