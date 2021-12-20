<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_medico')->unsigned();
            $table->string('id_paciente',13);
            $table->integer('id_cita')->unsigned()
                                        ->nullable()
                                        ->default(null);
            $table->integer('id_composicion_corporal')->unsigned();
            $table->integer('id_macros')->unsigned();
            $table->integer('id_info_paciente')->unsigned();
            $table->integer('id_dieta_habitual')->unsigned();
            $table->integer('id_plan_alimenticio')->unsigned();

            $table->string('motivo',100);
            $table->text('descripcion_dieta');
            $table->text('observaciones');
            $table->dateTime('fecha_hora');

            $table->foreign('id_medico')->references('id')->on('medico')->onDelete('cascade');
            $table->foreign('id_paciente')->references('rfc')->on('paciente')->onDelete('cascade');
            $table->foreign('id_cita')->references('id')->on('cita')->onDelete('cascade');
            $table->foreign('id_composicion_corporal')->references('id')->on('composicion_corporal')->onDelete('cascade');;
            $table->foreign('id_macros')->references('id')->on('macros')->onDelete('cascade');
            $table->foreign('id_info_paciente')->references('id')->on('info_paciente')->onDelete('cascade');
            $table->foreign('id_dieta_habitual')->references('id')->on('alimentacion')->onDelete('cascade');
            $table->foreign('id_plan_alimenticio')->references('id')->on('alimentacion')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta');
    }
}
