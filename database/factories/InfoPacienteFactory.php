<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Paciente;
use App\Models\InfoPaciente;

$factory->define(InfoPaciente::class,function(Faker $faker){
    $some_rfc = $faker->unique()->randomElement(Paciente::pluck('rfc')->toArray());
    return [
        'rfc_paciente'=>$some_rfc,
        'estatura'=>$faker->numberBetween($min = 140, $max = 200),
        'peso'=>$faker->numberBetween($min = 50, $max = 150),
        'actividad_fisica'=>'Moderada',
        'alergias'=>'Ninguna',
        'enfermedades'=>'Ninguna'
    ];
});

?>