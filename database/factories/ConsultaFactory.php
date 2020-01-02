<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Cita;
use App\Paciente;
use App\Consulta;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Consulta::class, function (Faker $faker) {
    $cita_id=$faker->randomElement(Cita::pluck('id')->toArray());
    $user=$faker->randomElement(User::pluck('id')->toArray());
    $cita=Cita::find($cita_id);
    $paciente=Paciente::find($cita->paciente_id);
    $cita->atendida=true;
    $cita->save();
    return [
        'user_id'=>$user,
        'paciente_id'=>$paciente->rfc,
        'cita_id'=>$cita_id,
        'motivo'=>"Para educación nutricional, reducción de peso, y modificación en cambio de hábitos",
        'descripcion_dieta'=>"Ninguna descripcion",
        'observaciones'=>"Ninguna observacion",
        'fecha_hora'=>$cita->fecha_hora,
        'edad_actual'=>$paciente->edad,
        'peso_actual'=>$paciente->peso,
        'estatura_actual'=>$paciente->estatura,
        'actividad_fisica_actual'=>$paciente->actividad_fisica,
        'enfermedades_actual'=>$paciente->enfermedades,
        'grasa_porcentaje'=>$faker->numberBetween($min = 0, $max = 50),
        'musculo_porcentaje'=>$faker->numberBetween($min = 0, $max = 50),
        'hueso_kilos'=>$faker->numberBetween($min = 1, $max = 50),
        'agua_litros'=>$faker->numberBetween($min = 1, $max = 50),
        'proteinas_porcentaje'=>15,
        'hidratos_porcentaje'=>60,
        'lipidos_porcentaje'=>25,
    ];
});
