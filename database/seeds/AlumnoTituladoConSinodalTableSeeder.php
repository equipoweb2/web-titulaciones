<?php

use Illuminate\Database\Seeder;
use App\AlumnoTituladoConSinodal;

class AlumnoTituladoConSinodalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AlumnoTituladoConSinodal::class, 70)->create();
    }
}
