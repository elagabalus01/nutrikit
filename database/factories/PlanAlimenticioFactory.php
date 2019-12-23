<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Cita;
use App\Paciente;
use App\Consulta;
use App\DietaHabitual;
use App\PlanAlimenticio;
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

$factory->define(PlanAlimenticio::class, function (Faker $faker) {
    $consulta_id=$faker->unique()->numberBetween(1,Consulta::count());
    return [
        'consulta_id'=>$consulta_id,
        'cereales'=>$faker->numberBetween($min = 1, $max = 50),
        'leguminosas'=>$faker->numberBetween($min = 1, $max = 50),
        'verduras'=>$faker->numberBetween($min = 1, $max = 50),
        'frutas'=>$faker->numberBetween($min = 1, $max = 50),
        'carnes'=>$faker->numberBetween($min = 1, $max = 50),
        'lacteos'=>$faker->numberBetween($min = 1, $max = 50),
        'grasas'=>$faker->numberBetween($min = 1, $max = 50),
        'azucares'=>$faker->numberBetween($min = 1, $max = 50),
    ];
});
