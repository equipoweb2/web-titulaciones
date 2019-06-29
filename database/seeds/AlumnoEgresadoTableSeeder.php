<?php

use Illuminate\Database\Seeder;
use App\AlumnoEgresado;

class AlumnoEgresadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AlumnoEgresado::class, 500)->create();
    }
}
