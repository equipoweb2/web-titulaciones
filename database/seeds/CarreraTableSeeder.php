<?php

use Illuminate\Database\Seeder;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            ['clave' => '01', 'nombre' => 'AGRONOMIA'],
            ['clave' => '02', 'nombre' => 'AMBIENTAL'],
            ['clave' => '03', 'nombre' => 'CONTADOR PUBLICO'],
            ['clave' => '04', 'nombre' => 'ELECTRONICA'],
            ['clave' => '05', 'nombre' => 'GESTION EMPRESARIAL'],
            ['clave' => '06', 'nombre' => 'INDUSTRIAL'],
            ['clave' => '07', 'nombre' => 'PETROLERA'],
            ['clave' => '08', 'nombre' => 'SISTEMAS'],
            ['clave' => '09', 'nombre' => 'MECATRONICA'],
        ]);
    }
}
