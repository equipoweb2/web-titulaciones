<?php

use Illuminate\Database\Seeder;
use App\OpcionTitulacion;

class OpcionTitulacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opcion_titulacions')->insert([
            ['id' => 1, 'nombre' => 'TESIS PROFESIONAL'],
            ['id' => 2, 'nombre' => 'LIBRO DE TEXTO O PROTOTIPOS DIDACTICOS'],
            ['id' => 3, 'nombre' => 'PROYECTO DE INVESTIGACIÓN'],
            ['id' => 4, 'nombre' => 'DISEÑO O REDISEÑO DE EQUIPO, APARATO O MAQUINARIA'],
            ['id' => 5, 'nombre' => 'CURSO ESPECIAL DE TITULACIÓN'],
            ['id' => 6, 'nombre' => 'EXAMEN GLOBAL POR ÁREAS DE CONOCIMMIENTO'],
            ['id' => 7, 'nombre' => 'MEMORIA DE EXPERIENCIA PROFESIONAL'],
            ['id' => 8, 'nombre' => 'ESCOLARIDAD POR PROMEDIO'],
            ['id' => 9, 'nombre' => 'ESCOLARIDAD POR ESTUDIOS DE POSGRADO'],
            ['id' => 10, 'nombre' => 'MEMORIA DE RESIDENCIA PROFESIONAL'],
            ['id' => 11, 'nombre' => 'EXAMEN GENERAL PARA EL EGRESO DE LA LICENCIATURA (EGEL) DE CENEVAL A.C.'],
            ['id' => 12, 'nombre' => 'TITULACION  INTEGRAL'],
        ]);
    }
}
