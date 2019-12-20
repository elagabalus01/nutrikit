<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('paciente_id');
            $table->integer('cita_id')->unsigned()
                                        ->nullable()
                                        ->default(null);
            $table->string('descripcion_dieta');
            $table->string('observaciones');
            $table->dateTime('fecha_hora');
            $table->integer('edad_actual')->unsigned();
            $table->float('peso_actual')->unsigned();
            $table->integer('estatura_actual')->unsigned();
            $table->string('actividad_fisica_actual');
            $table->float('grasa_porcentaje');
            $table->float('musculo_porcentaje');
            $table->float('hueso_kilos');
            $table->float('agua_litros');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paciente_id')->references('rfc')->on('pacientes')->onDelete('cascade');
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
