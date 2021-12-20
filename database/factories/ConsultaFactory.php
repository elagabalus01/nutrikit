<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Macros;
use App\Models\ComposicionCorporal;
use App\Models\InfoPaciente;
use App\Models\Alimentacion;


$factory->define(Consulta::class, function (Faker $faker) {
    $medico=$faker->randomElement(Medico::pluck('id')->toArray());
    $id_cita=$faker->randomElement(Cita::pluck('id')->toArray());
    $cita=Cita::find($id_cita);
    $paciente=Paciente::find($cita->id_paciente);
    $cita->atendida=true;
    $cita->save();
    $macros=$faker->unique()->numberBetween(1,Macros::count());
    $habitual=$faker->unique()->numberBetween(1,Alimentacion::count());
    $plan=$faker->unique()->numberBetween(1,Alimentacion::count());
    echo $paciente->rfc.PHP_EOL;
    $composicion=ComposicionCorporal::where('rfc_paciente', '=', $paciente->rfc)->firstOrFail()->id;
    $info=InfoPaciente::where('rfc_paciente', '=', $paciente->rfc)->firstOrFail()->id;
    return [
        'id_medico'=>$medico,
        'id_paciente'=>$paciente->rfc,
        'id_cita'=>$id_cita,
        'id_composicion_corporal'=>$composicion,
        'id_info_paciente'=>$info,
        'id_macros'=>$macros,
        'id_dieta_habitual'=>$habitual,
        'id_plan_alimenticio'=>$plan,
        'motivo'=>"Para educación nutricional, reducción de peso, y modificación en cambio de hábitos",
        'descripcion_dieta'=>"Ninguna descripcion",
        'observaciones'=>"Ninguna observacion",
        'fecha_hora'=>$cita->fecha_hora
    ];
});

?>