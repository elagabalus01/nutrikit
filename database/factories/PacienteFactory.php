<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Paciente;

$factory->define(Paciente::class, function (Faker $faker) {
    $gender = $faker->randomElement(['Masculino', 'Femenino','Otro']);
    return [
        'rfc'=>$faker->unique()->regexify('[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}'),
        'nombre'=>$faker->firstName,
        'paterno'=>$faker->lastName,
        'materno'=>$faker->lastName,
        'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-30 years', $endDate = '-13 years'),
        'telefono'=>$faker->regexify('[0-9]{10}'),
        'correo_electronico'=>$faker->safeEmail,
        'sexo'=>$gender
    ];
});

?>