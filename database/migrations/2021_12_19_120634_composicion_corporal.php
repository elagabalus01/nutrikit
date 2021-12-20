<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComposicionCorporal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('composicion_corporal',function(Blueprint $table){
            $table->increments('id');
            $table->string('rfc_paciente',13);
            $table->float('grasa_porcentaje',5,2);
            $table->float('musculo_porcentaje',5,2);
            $table->float('hueso_kilos',5,2);
            $table->float('agua_litros',5,2);
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
        Schema::dropIfExists('composicion_corporal');
    }
}
