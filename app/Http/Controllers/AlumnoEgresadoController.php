<?php

namespace App\Http\Controllers;

use App\AlumnoEgresado;
use Illuminate\Http\Request;
use App\Carrera;
use App\Periodo;
use App\Generacion;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AlumnoEgresadoController extends Controller
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
    public function index(Request $request)
    {
        $query = $request->get('query');
        $egresados = AlumnoEgresado::buscar($query)->get();
        return view('egresados.index', compact('egresados', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::all()->pluck('nombre', 'id');
        $periodos = Periodo::all()->pluck('nombre', 'id');
        $generaciones = Generacion::all()->pluck('nombre', 'id');
        return view('egresados.create', compact('carreras', 'periodos', 'generaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'numero_control' => 'required|max:255|unique:alumno_egresados',
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'promedio' => 'required',
            'carrera' => 'required',
            'periodo_egreso' => 'required',
            'generacion' => 'required',
        ]);
        $egresado = AlumnoEgresado::create([
            'numero_control' => $request->get('numero_control'),
            'nombre' => $request->get('nombre'),
            'apellido_paterno' => $request->get('apellido_paterno'),
            'apellido_materno' => $request->get('apellido_materno'),
            'promedio' => $request->get('promedio'),
            'id_carrera' => $request->get('carrera'),
            'id_periodo_egreso' => $request->get('periodo_egreso'),
            'id_generacion' => $request->get('generacion'),
        ]);
        Session::flash('message', 'Alumno egresado creado con éxito!');
        return redirect()->route('egresados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlumnoEgresado  $alumnoEgresado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlumnoEgresado  $alumnoEgresado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $egresado = AlumnoEgresado::find($id);
        $carreras = Carrera::all()->pluck('nombre', 'id');
        $periodos = Periodo::all()->pluck('nombre', 'id');
        $generaciones = Generacion::all()->pluck('nombre', 'id');
        return view('egresados.edit')
            ->with('egresado', $egresado)
            ->with('carreras', $carreras)
            ->with('periodos', $periodos)
            ->with('generaciones', $generaciones);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlumnoEgresado  $alumnoEgresado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'promedio' => 'required',
            'carrera' => 'required',
            'periodo_egreso' => 'required',
            'generacion' => 'required',
        ]);
        $egresado = AlumnoEgresado::find($id)->update([
            'nombre' => $request->get('nombre'),
            'apellido_paterno' => $request->get('apellido_paterno'),
            'apellido_materno' => $request->get('apellido_materno'),
            'promedio' => $request->get('promedio'),
            'id_carrera' => $request->get('carrera'),
            'id_periodo_egreso' => $request->get('periodo_egreso'),
            'id_generacion' => $request->get('generacion'),
        ]);
        Session::flash('message', 'Alumno egresado actualizado con éxito!');
        return redirect()->route('egresados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlumnoEgresado  $alumnoEgresado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            AlumnoEgresado::find($id)->delete();
        } catch (QueryException $e) {
            Log::info('Excepción capturada: ');
            Log::info($e->getMessage());
            return redirect()->back()->with('error-message', 'Ocurrió un error con la base de datos');
        }
        Log::info('Deleted alumno egresado: '.$id);
        Session::flash('message', 'Alumno egresado borrado con éxito!');
        return redirect()->route('egresados.index');
    }
}
