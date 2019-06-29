<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\AlumnoTitulado;
use Faker\Generator as Faker;
use App\AlumnoEgresado;
use App\OpcionTitulacion;

$factory->define(AlumnoTitulado::class, function (Faker $faker) {
    $egresados = AlumnoEgresado::all()->pluck('id')->toArray();
    $opciones = OpcionTitulacion::all()->pluck('id')->toArray();

    return [
        'id_alumno_egresado' => $faker->unique()->randomElement($egresados),
        'id_opcion_titulacion' => $faker->randomElement($opciones),
        'edad' => $faker->numberBetween(22, 30),
        'fecha_titulacion' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'hora_titulacion' => $faker->time($format = 'H:i', $max = 'now'),
    ];
});
