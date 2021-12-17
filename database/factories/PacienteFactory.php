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

$factory->define(Paciente::class, function (Faker $faker) {
    $gender = $faker->randomElement(['Masculino', 'Femenino','Otro']);
    return [
        'rfc'=>$faker->regexify('[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}'),
        'nombre'=>$faker->name,
        'telefono'=>$faker->regexify('[0-9]{10}'),
        'correo_electronico'=>$faker->safeEmail,
        'estatura'=>$faker->numberBetween($min = 140, $max = 200),
        'peso'=>$faker->numberBetween($min = 50, $max = 150),
        'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-30 years', $endDate = '-13 years'),
        'sexo'=>$gender,
        'actividad_fisica'=>'Ninguna',
        'alergias'=>'No',
        'enfermedades'=>'Ninguna',
    ];
});
