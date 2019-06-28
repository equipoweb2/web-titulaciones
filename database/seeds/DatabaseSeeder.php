<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CarreraTableSeeder::class);
        $this->call(GeneracionTableSeeder::class);
        $this->call(OpcionTitulacionTableSeeder::class);
        $this->call(PeriodoTableSeeder::class);

        $this->call(AlumnoEgresadoTableSeeder::class);
    }
}
