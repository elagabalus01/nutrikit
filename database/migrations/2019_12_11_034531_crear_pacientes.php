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
            $table->string('rfc');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo_electronico');
            $table->string('direccion');
            $table->integer('estatura')->unsigned();
            $table->integer('peso')->unsigned();
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('alergias');
            $table->string('actividad_fisica');

            $table->primary('rfc');
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
