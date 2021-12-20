<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Medico;

$factory->define(Medico::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'paterno'=>$faker->lastName,
        'materno'=>$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'),
        'api_token' => Str::random(60),
    ];
});

?>