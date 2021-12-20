<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\ComposicionCorporal;
use App\Models\Paciente;

$factory->define(ComposicionCorporal::class, function (Faker $faker) {
    $rfc_paciente=$faker->unique()->randomElement(Paciente::pluck('rfc')->toArray());
    print $rfc_paciente.PHP_EOL;
    return [
        'rfc_paciente'=>$rfc_paciente,
        'grasa_porcentaje'=>$faker->numberBetween($min = 0, $max = 50),
        'musculo_porcentaje'=>$faker->numberBetween($min = 0, $max = 50),
        'hueso_kilos'=>$faker->numberBetween($min = 1, $max = 50),
        'agua_litros'=>$faker->numberBetween($min = 1, $max = 50)
    ];
});

?>