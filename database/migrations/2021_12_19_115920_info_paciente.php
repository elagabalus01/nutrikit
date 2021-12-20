<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InfoPaciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_paciente', function (Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->string('rfc_paciente',13);
            $table->tinyInteger('estatura')->unsigned();
            $table->float('peso',5,2)->unsigned();
            $table->string('actividad_fisica',100);
            $table->string('alergias',100);
            $table->string('enfermedades',100);
            $table->foreign('rfc_paciente')->references('rfc')->on('paciente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_paciente');
    }
}
