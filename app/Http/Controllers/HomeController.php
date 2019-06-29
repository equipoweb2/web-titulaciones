<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Carrera;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

        $currentCarrera = -1;
        $egresadosPorCarrera = array();
        $tituladosPorCarrera = array();
        foreach ($data as $row) {
            if ($currentCarrera !== $row->id_carrera) {
                $currentCarrera = $row->id_carrera;
                $egresadosPorCarrera[$currentCarrera] = 0;
                $tituladosPorCarrera[$currentCarrera] = 0;
            }
            $egresadosPorCarrera[$currentCarrera] += $row->egresados;
            $tituladosPorCarrera[$currentCarrera] += $row->titulados;
        }

        $colors = ['red', 'blue', 'green', 'teal', 'yellow', 'orange', 'pink', 'gray', 'indigo', 'purple'];

        $totalChart = new SampleChart;
        $totalChart->labels(['Total']);
        $totalChart->dataset('Egresados', 'bar', [array_sum($egresadosPorCarrera)])->backgroundColor('#90cdf4');
        $totalChart->dataset('Titulados', 'bar', [array_sum($tituladosPorCarrera)])->backgroundColor('#9ae6b4');

        $barChart = new SampleChart;
        $barChart->labels($carreras->pluck('nombre'));
        $barChart->dataset('Egresados por carrera', 'bar', array_values($egresadosPorCarrera))->backgroundColor(array_fill(0, count($egresadosPorCarrera), '#90cdf4'));
        $barChart->dataset('Titulados por carrera', 'bar', array_values($tituladosPorCarrera))->backgroundColor(array_fill(0, count($tituladosPorCarrera), '#9ae6b4'));

        $pieChart = new SampleChart;
        $pieChart->title('Egresados por carrera');
        $pieChart->labels($carreras->pluck('nombre'));
        $bgColors = array();
        for ($i = 0; $i < count($egresadosPorCarrera); $i++) {
            $bgColors[$i] = $colors[array_rand($colors)];
        }
        $pieChart->dataset('Egresados por carrera', 'pie', array_values($egresadosPorCarrera))->backgroundColor($bgColors);

        $tituladosPieChart = new SampleChart;
        $tituladosPieChart->title('Titulados por carrera');
        $tituladosPieChart->labels($carreras->pluck('nombre'));
        $tituladosPieChart->dataset('Titulados por carrera', 'pie', array_values($tituladosPorCarrera))->backgroundColor($bgColors);

        return view('index', compact('totalChart', 'barChart', 'pieChart', 'tituladosPieChart'));
    }
}
