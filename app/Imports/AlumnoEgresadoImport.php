<?php

namespace App\Imports;

use App\AlumnoEgresado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Log;
use App\Carrera;
use App\Periodo;
use App\Generacion;

class AlumnoEgresadoImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $carrera = Carrera::where('nombre', $row['carrera'])->first();
        $periodo = Periodo::where('nombre', $row['periodo_egreso'])->first();
        $generacion = Generacion::where('nombre', $row['generacion'])->first();
        return new AlumnoEgresado([
            'numero_control' => $row['numero_control'],
            'nombre' => $row['nombre'],
            'apellido_paterno' => $row['apellido_paterno'],
            'apellido_materno' => $row['apellido_materno'],
            'promedio' => $row['promedio'],
            'id_carrera' => $carrera->id,
            'id_periodo_egreso' => $periodo->id,
            'id_generacion' => $generacion->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'numero_control' => 'required|max:255|unique:alumno_egresados',
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'promedio' => 'required',
            'carrera' => 'required|exists:carreras,nombre',
            'periodo_egreso' => [ 'required', 'max:255', 'regex:/^((FEB-JUL\d{2})|(AG\d{2}-EN\d{2}))$/',
                'exists:periodos,nombre',
            ],
            'generacion' => 'required|regex:/^\d{4}[-]\d{4}$/|exists:generacions,nombre',
        ];
    }
}
