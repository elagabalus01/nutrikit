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
            $table->string('paciente_id',13);
            $table->integer('cita_id')->unsigned()
                                        ->nullable()
                                        ->default(null);
            $table->string('motivo',100);
            $table->text('descripcion_dieta');
            $table->text('observaciones');
            $table->dateTime('fecha_hora');
            $table->tinyInteger('edad_actual')->unsigned();
            $table->float('peso_actual',5,2)->unsigned();
            $table->tinyInteger('estatura_actual')->unsigned();
            $table->string('actividad_fisica_actual',100);
            $table->string('enfermedades_actual',100);
            $table->float('grasa_porcentaje',5,2);
            $table->float('musculo_porcentaje',5,2);
            $table->float('hueso_kilos',5,2);
            $table->float('agua_litros',5,2);
            $table->tinyInteger('proteinas_porcentaje')->unsigned();
            $table->tinyInteger('hidratos_porcentaje')->unsigned();
            $table->tinyInteger('lipidos_porcentaje')->unsigned();

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
