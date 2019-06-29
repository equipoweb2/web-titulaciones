<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Sinodal;
use Faker\Generator as Faker;

$factory->define(Sinodal::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
    ];
});
