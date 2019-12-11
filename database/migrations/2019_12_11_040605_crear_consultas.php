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
            $table->integer('paciente_id')->unsigned();
            $table->integer('cita_id')->unsigned()
                                        ->nullable()
                                        ->default(null);
            $table->integer('dietaAbitual_id')->unsigned();
            $table->integer('planAlimenticio_id')->unsigned();
            $table->string('observaciones');
            $table->string('fechaHora');

            $table->foreign('user_id')->refecences('id')->on('users')->onDelete('cascade');
            $table->foreign('paciente_id')->refecences('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('cita_id')->refecences('id')->on('citas')->onDelete('cascade');
            $table->foreign('dietaAbitual_id')->refecences('id')->on('dietasAbituales')->onDelete('cascade');
            $table->foreign('planAlimenticio_id')->refecences('id')->on('planesAlimenticios')->onDelete('cascade');
            
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
