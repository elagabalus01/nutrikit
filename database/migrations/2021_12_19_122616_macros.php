<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Macros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('macros',function(Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('proteinas')->unsigned();
            $table->tinyInteger('hidratos')->unsigned();
            $table->tinyInteger('lipidos')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('macros');
    }
}
