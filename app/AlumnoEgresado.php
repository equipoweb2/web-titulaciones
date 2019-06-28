<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AlumnoEgresado extends Model
{
    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera');
    }

    public function periodoEgreso()
    {
        return $this->belongsTo('App\Periodo', 'id_periodo_egreso');
    }

    public function generacion()
    {
        return $this->belongsTo('App\Generacion', 'id_generacion');
    }

    public function scopeBuscar($query, $nombre) {
        $carreras = Carrera::where('nombre', 'LIKE', '%'.$nombre.'%')->get()->pluck('id')->toArray();
        $periodos = Periodo::where('nombre', 'LIKE', '%'.$nombre.'%')->get()->pluck('id')->toArray();
        $generaciones = Generacion::where('nombre', 'LIKE', '%'.$nombre.'%')->get()->pluck('id')->toArray();

        return $query->where('numero_control', 'LIKE', '%'.$nombre.'%')
                ->orWhere('nombre', 'LIKE', '%'.$nombre.'%')
                ->orWhere('apellido_paterno', 'LIKE', '%'.$nombre.'%')
                ->orWhere('apellido_materno', 'LIKE', '%'.$nombre.'%')
                ->orWhere('promedio', 'LIKE', '%'.$nombre.'%')
                ->orWhereIn('id_carrera', $carreras)
                ->orWhereIn('id_periodo_egreso', $periodos)
                ->orWhereIn('id_generacion', $generaciones);
    }

    protected $fillable = [
        'numero_control', 'nombre', 'apellido_paterno', 'apellido_materno', 'promedio',
        'id_carrera', 'id_periodo_egreso', 'id_generacion',
    ];
}
