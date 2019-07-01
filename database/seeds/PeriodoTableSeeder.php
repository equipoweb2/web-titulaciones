<?php

use Illuminate\Database\Seeder;

class PeriodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos')->insert([
            ['nombre' => 'AG15-EN16'],
            ['nombre' => 'FEB-JUL16'],
            ['nombre' => 'AG16-EN17'],
            ['nombre' => 'FEB-JUL17'],
            ['nombre' => 'AG17-EN18'],
            ['nombre' => 'FEB-JUL18'],
            ['nombre' => 'AG18-EN19'],
            ['nombre' => 'FEB-JUL19'],
            ['nombre' => 'AG19-EN20'],
        ]);
    }
}
