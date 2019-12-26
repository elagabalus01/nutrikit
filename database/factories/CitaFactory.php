<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Cita;
use App\Paciente;
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

$factory->define(Cita::class, function (Faker $faker) {
    $pacientes = App\Paciente::pluck('rfc')->toArray();
    return [
        'fecha_hora'=>$faker->dateTimeBetween($startDate = 'now', $endDate = '+30 days'),
        'paciente_id'=>$faker->randomElement($pacientes),
    ];
});
