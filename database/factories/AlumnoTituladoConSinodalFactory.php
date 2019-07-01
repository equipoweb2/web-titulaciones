<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\AlumnoTituladoConSinodal;
use Faker\Generator as Faker;
use App\AlumnoTitulado;
use App\Sinodal;

$factory->define(AlumnoTituladoConSinodal::class, function (Faker $faker) {
    $titulados = AlumnoTitulado::all()->pluck('id')->toArray();
    $sinodales = Sinodal::all()->pluck('id')->toArray();

    return [
        'id_alumno_titulado' => $faker->randomElement($titulados),
        'id_sinodal' => $faker->randomElement($sinodales),
    ];
});
