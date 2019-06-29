<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use Illuminate\Support\Facades\Log;
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
        /*$carreras = DB::table('alumno_egresados')
                ->join('carreras', 'alumno_egresados.id_carrera', '=', 'carreras.id')
                ->select(DB::raw('count(id_carrera) as egresados_carrera, carreras.nombre as carrera, carreras.id as id_carrera'))
                ->groupBy('carreras.nombre', 'carreras.id')
                ->get();
        Log::info($carreras);
        foreach ($carreras as $carrera) {
            //Log::info($carrera);
        }
        $egresados = DB::table('alumno_egresados')
                ->join('generacions', 'alumno_egresados.id_generacion', '=', 'generacions.id')
                ->join('carreras', 'alumno_egresados.id_carrera', '=', 'carreras.id')
                ->select(DB::raw('count(alumno_egresados.id) as total_egresados, carreras.id as id_carrera, generacions.nombre as generacion, generacions.id as id_generacion'))
                ->groupBy('carreras.id', 'generacions.id', 'generacions.nombre')
                ->get();
        Log::info($egresados);
        $titulados = DB::table('alumno_titulados')
                ->join('alumno_egresados', 'alumno_egresados.id', '=', 'alumno_titulados.id_alumno_egresado')
                ->join('generacions', 'alumno_egresados.id_generacion', '=', 'generacions.id')
                ->join('carreras', 'alumno_egresados.id_carrera', '=', 'carreras.id')
                ->select(DB::raw('count(alumno_titulados.id) as total_titulados, carreras.id as id_carrera, generacions.nombre as generacion, generacions.id as id_generacion'))
                ->groupBy('carreras.id', 'generacions.id', 'generacions.nombre')
                ->get();
        Log::info($titulados);*/

        $data = DB::table('alumno_egresados')
            ->leftJoin('alumno_titulados', 'alumno_egresados.id', '=', 'alumno_titulados.id_alumno_egresado')
            ->join('generacions', 'alumno_egresados.id_generacion', '=', 'generacions.id')
            ->join('carreras', 'alumno_egresados.id_carrera', '=', 'carreras.id')
            ->select(DB::raw('count(alumno_egresados.id) as egresados, sum(CASE WHEN alumno_egresados.id = alumno_titulados.id_alumno_egresado THEN 1 ELSE 0 END) as titulados, carreras.id as id_carrera, carreras.nombre as carrera, generacions.nombre as generacion'))
            ->groupBy('carreras.id', 'carreras.nombre', 'generacions.nombre')
            ->get();

        $currentCarrera = -1;
        $egresadosPorCarrera = array();
        foreach ($data as $row) {
            if ($currentCarrera !== $row->id_carrera) {
                $currentCarrera = $row->id_carrera;
                $egresadosPorCarrera[$currentCarrera] = 0;
            }
            $egresadosPorCarrera[$currentCarrera] += $row->egresados;
        }
        Log::info($egresadosPorCarrera);

        return view('alumnos.index', compact('carreras', 'data'));
    }
}
