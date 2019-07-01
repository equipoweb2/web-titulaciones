<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\AlumnoEgresado;
use Faker\Generator as Faker;
use App\Carrera;
use App\Periodo;
use App\Generacion;

$factory->define(AlumnoEgresado::class, function (Faker $faker) {
    $carreras = Carrera::all()->pluck('id')->toArray();
    $periodos = Periodo::all()->pluck('id')->toArray();
    $generaciones = Generacion::all()->pluck('id')->toArray();

    return [
        'numero_control' => $faker->isbn10,
        'nombre' => $faker->firstName(),
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        'promedio' => $faker->randomFloat(2, 7, 10),
        'id_carrera' => $faker->randomElement($carreras),
        'id_periodo_egreso' => $faker->randomElement($periodos),
        'id_generacion' => $faker->randomElement($generaciones),
    ];
});
