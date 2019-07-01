<?php

namespace App\Imports;

use App\AlumnoTitulado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Log;
use App\Carrera;
use App\Periodo;
use App\Generacion;
use App\Exceptions\TituladoExistsException;
use App\AlumnoEgresado;
use App\Sinodal;
use App\AlumnoTituladoConSinodal;
use App\OpcionTitulacion;

class AlumnoTituladoImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $egresado = AlumnoEgresado::where('numero_control', $row['numero_control'])->first();
        $titulado = AlumnoTitulado::where('id_alumno_egresado', $egresado->id)->first();
        if ($titulado) {
            throw new TituladoExistsException('Alumno titulado '.$row['numero_control'].' ya existe! Te recomendamos editarlo.');
        }
        // Creación de sinodales
        $sinodalesArray = explode(',', $row['sinodales']);
        $idsSinodales = array();
        foreach ($sinodalesArray as $sss) {
            $nombre = trim($sss);
            $existsSinodal = Sinodal::where('nombre', $nombre)->first();
            if ($existsSinodal) {
                $idsSinodales[$existsSinodal->id] = $existsSinodal->id;
            } else {
                $existsSinodal = Sinodal::create([
                    'nombre' => $nombre,
                ]);
                $idsSinodales[$existsSinodal->id] = $existsSinodal->id;
            }
        }
        // Creación de alumno titulado
        $opcionTitulacion = OpcionTitulacion::where('nombre', $row['opcion_titulacion'])->first();
        $dateOld = $row['fecha_titulacion'];
        // Se formatea la fecha de titulación, pasa de 'día-mes-año' a 'año-mes-día'
        $formatedDate = date("Y-m-d", strtotime($dateOld));
        $titulado = AlumnoTitulado::create([
            'id_alumno_egresado' => $egresado->id,
            'id_opcion_titulacion' => $opcionTitulacion->id,
            'edad' => $row['edad'],
            'fecha_titulacion' => $formatedDate,
            'hora_titulacion' => $row['hora_titulacion'],
        ]);
        // Creación de tabla de titulados con sinodales
        foreach ($idsSinodales as $sinodal) {
            AlumnoTituladoConSinodal::create([
                'id_alumno_titulado' => $titulado->id,
                'id_sinodal' => $sinodal,
            ]);
        }

        return $titulado;
    }

    public function rules(): array
    {
        return [
            'numero_control' => 'required|max:255|exists:alumno_egresados,numero_control',
            'opcion_titulacion' => 'required|max:255|exists:opcion_titulacions,nombre',
            'edad' => 'required|max:5',
            'fecha_titulacion' => 'required|max:15|regex:/^\d{2}[-]\d{2}[-]\d{4}$/',
            'hora_titulacion' => 'nullable|max:10|regex:/^\d{2}[:]\d{2}$/',
            'sinodales' => 'required|regex:/^[\s\S ,]+$/',
        ];
    }
}
