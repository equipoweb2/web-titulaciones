<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::all();

        $data = DB::table('alumno_egresados')
            ->leftJoin('alumno_titulados', 'alumno_egresados.id', '=', 'alumno_titulados.id_alumno_egresado')
            ->join('generacions', 'alumno_egresados.id_generacion', '=', 'generacions.id')
            ->join('carreras', 'alumno_egresados.id_carrera', '=', 'carreras.id')
            ->select(DB::raw('count(alumno_egresados.id) as egresados, sum(CASE WHEN alumno_egresados.id = alumno_titulados.id_alumno_egresado THEN 1 ELSE 0 END) as titulados, carreras.id as id_carrera, carreras.nombre as carrera, generacions.nombre as generacion'))
            ->groupBy('carreras.id', 'carreras.nombre', 'generacions.nombre')
            ->get();

        return view('alumnos.index', compact('carreras', 'data'));
    }
}
