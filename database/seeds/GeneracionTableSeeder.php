<?php

use Illuminate\Database\Seeder;

class GeneracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generacions')->insert([
            ['nombre' => '2002-2007'],
            ['nombre' => '2003-2008'],
            ['nombre' => '2004-2009'],
            ['nombre' => '2005-2010'],
            ['nombre' => '2006-2011'],
            ['nombre' => '2007-2012'],
            ['nombre' => '2008-2013'],
            ['nombre' => '2009-2014'],
            ['nombre' => '2010-2015'],
            ['nombre' => '2011-2016'],
            ['nombre' => '2012-2017'],
            ['nombre' => '2013-2018'],
        ]);
    }
}
