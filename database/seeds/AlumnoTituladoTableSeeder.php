<?php

use Illuminate\Database\Seeder;
use App\AlumnoTitulado;

class AlumnoTituladoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AlumnoTitulado::class, 300)->create();
    }
}
