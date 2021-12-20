<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Alimentacion;


$factory->define(Alimentacion::class, function (Faker $faker) {
    return [
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

?>