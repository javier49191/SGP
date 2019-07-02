<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Domicilio;
use Faker\Generator as Faker;

$factory->define(Domicilio::class, function (Faker $faker) {
    return [
        'calle' => $faker->word,
        'numero' => $faker->numberBetween($min = 10, $max = 90),
        'provincia' => $faker->word,
        'ciudad' => $faker->word,
        'dpto' => $faker->numberBetween($min = 10, $max = 90),
        'piso' => $faker->numberBetween($min = 10, $max = 90),
    ];
});
