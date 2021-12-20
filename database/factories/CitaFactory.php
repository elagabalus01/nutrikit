<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Cita;
use App\Models\Paciente;

$factory->define(Cita::class, function (Faker $faker) {
    $paciente = $faker->unique()->randomElement(Paciente::pluck('rfc')->toArray());

    print $paciente.PHP_EOL;
    return [
        'fecha_hora'=>$faker->dateTimeBetween($startDate = '-30 days', $endDate = '-1 days'),
        'id_paciente'=>$paciente,
    ];
});

?>