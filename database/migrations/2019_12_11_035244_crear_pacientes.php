<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estatura')->unsigned();
            $table->integer('peso')->unsigned();
            $table->integer('edad')->unsigned();
            $table->string('genero');
            $table->string('alergias');
            $table->string('actividadFisica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
