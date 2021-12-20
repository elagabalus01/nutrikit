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
        Schema::create('paciente', function (Blueprint $table){
            $table->string('rfc',13);
            $table->string('nombre',64);
            $table->string('paterno',64);
            $table->string('materno',64);
            $table->string('telefono',10);
            $table->string('correo_electronico',50);
            $table->string('sexo',9);
            $table->date('fecha_nacimiento');
            // $table->tinyInteger('estatura')->unsigned();
            // $table->float('peso',5,2)->unsigned();
            // $table->string('actividad_fisica',100);
            // $table->string('alergias',100);
            // $table->string('enfermedades',100);

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
        Schema::dropIfExists('paciente');
    }
}
