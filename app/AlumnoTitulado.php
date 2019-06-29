<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoTitulado extends Model
{
    public function egresado()
    {
        return $this->belongsTo('App\AlumnoEgresado', 'id_alumno_egresado');
    }

    public function opcionTitulacion()
    {
        return $this->belongsTo('App\OpcionTitulacion', 'id_opcion_titulacion');
    }

    protected $fillable = [
        'id_alumno_egresado', 'id_opcion_titulacion', 'edad', 'fecha_titulacion', 'hora_titulacion',
    ];
}
