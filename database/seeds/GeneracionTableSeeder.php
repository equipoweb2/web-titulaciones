<?php

use Illuminate\Database\Seeder;
use App\Periodo;
use App\Generacion;
use Illuminate\Support\Facades\Log;

class GeneracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generaciones = [
            '2002-2007',
            '2003-2008',
            '2004-2009',
            '2005-2010',
            '2006-2011',
            '2007-2012',
            '2008-2013',
            '2009-2014',
            '2010-2015',
            '2011-2016',
            '2012-2017',
            '2013-2018',
            '2014-2019',
            '2015-2020',
        ];
        foreach ($generaciones as $value) {
            $this->addGeneracion($value);
        }
    }

    private function addGeneracion($nombre) {
        $splited = explode('-', $nombre);
        $inicio = (int) substr($splited[0], 2);
        $this->addPeriodo( 'AG'.$this->str($inicio).'-EN'.$this->str($inicio + 1) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 1) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 1).'-EN'.$this->str($inicio + 2) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 2) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 2).'-EN'.$this->str($inicio + 3) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 3) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 3).'-EN'.$this->str($inicio + 4) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 4) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 4).'-EN'.$this->str($inicio + 5) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 5) );

        Generacion::create(['nombre' => $nombre ]);
    }

    private function addPeriodo($nombre) {
        $exists = Periodo::where('nombre', $nombre)->first();
        if (!$exists) {
            Periodo::create(['nombre' => $nombre ]);
        }
    }

    private function str($num) {
        if (strlen((string) $num) === 1) {
            return '0'.$num;
        } else {
            return $num;
        }
    }
}
