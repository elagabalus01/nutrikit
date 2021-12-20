<?php

use Faker\Generator as Faker;
use App\Models\Macros;

$factory->define(Macros::class,function(Faker $faker){
    return [
        'proteinas'=>15,
        'hidratos'=>60,
        'lipidos'=>25
    ];
});

?>