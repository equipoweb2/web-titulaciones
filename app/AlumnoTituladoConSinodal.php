<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoTituladoConSinodal extends Model
{
    protected $fillable = [
        'id_alumno_titulado', 'id_sinodal',
    ];
}
