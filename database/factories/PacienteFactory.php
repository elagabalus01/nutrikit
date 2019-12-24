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
    $gender = $faker->randomElement(['Masculino', 'Femenino']);
    return [
        'rfc'=>$faker->regexify('[a-zA-ZÑñÜü]{4}[0-9]{6}[a-zA-ZÑñÜü0-9]{3}'),
        'nombre'=>$faker->name,
        'telefono'=>$faker->regexify('[0-9]{10}'),
        'correo_electronico'=>$faker->safeEmail,
        'estatura'=>$faker->numberBetween($min = 1, $max = 50),
        'peso'=>$faker->numberBetween($min = 1, $max = 50),
        'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
        'sexo'=>$gender,
        'alergias'=>'No',
        'actividad_fisica'=>'ninguna',
    ];
});
