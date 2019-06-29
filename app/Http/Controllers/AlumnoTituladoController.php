<?php

namespace App\Http\Controllers;

use App\AlumnoTitulado;
use Illuminate\Http\Request;
use App\OpcionTitulacion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\AlumnoEgresado;

class AlumnoTituladoController extends Controller
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
        $titulados = AlumnoTitulado::all();
        return view('titulados.index', compact('titulados', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opciones = OpcionTitulacion::all()->pluck('nombre', 'id');
        return view('titulados.create', compact('opciones'));
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
            'numero_control' => 'required|max:255|exists:alumno_egresados,numero_control',
            'opcion_titulacion' => 'required|max:255',
            'edad' => 'required|max:5',
            'fecha_titulacion' => 'required|max:15|regex:/^\d{2}[-]\d{2}[-]\d{4}$/',
            'hora_titulacion' => 'nullable|max:10|regex:/^\d{2}[:]\d{2}$/',
        ]);
        $egresado = AlumnoEgresado::where('numero_control', $request->get('numero_control'))->first();
        $titulado = AlumnoTitulado::where('id_alumno_egresado', $egresado->id)->first();
        if ($titulado) {
            Session::flash('error-message', 'Alumno titulado '.$request->get('numero_control').' ya existe! Te recomendamos editarlo.');
            return back()->withInput();
        }
        $dateOld = $request->get('fecha_titulacion');
        // Se formatea la fecha de titulación, pasa de 'día-mes-año' a 'año-mes-día'
        $formatedDate = date("Y-m-d", strtotime($dateOld));
        $titulado = AlumnoTitulado::create([
            'id_alumno_egresado' => $egresado->id,
            'id_opcion_titulacion' => $request->get('opcion_titulacion'),
            'edad' => $request->get('edad'),
            'fecha_titulacion' => $formatedDate,
            'hora_titulacion' => $request->get('hora_titulacion'),
        ]);
        Session::flash('message', 'Alumno titulado creado con éxito!');
        return redirect()->route('titulados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlumnoTitulado  $alumnoTitulado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlumnoTitulado  $alumnoTitulado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulado = AlumnoTitulado::find($id);
        $opciones = OpcionTitulacion::all()->pluck('nombre', 'id');
        return view('titulados.edit')
            ->with('titulado', $titulado)
            ->with('opciones', $opciones);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlumnoTitulado  $alumnoTitulado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'opcion_titulacion' => 'required|max:255',
            'edad' => 'required|max:5',
            'fecha_titulacion' => 'required|max:15|regex:/^\d{2}[-]\d{2}[-]\d{4}$/',
            'hora_titulacion' => 'nullable|max:10|regex:/^\d{2}[:]\d{2}$/',
        ]);
        $dateOld = $request->get('fecha_titulacion');
        // Se formatea la fecha de titulación, pasa de 'día-mes-año' a 'año-mes-día'
        $formatedDate = date("Y-m-d", strtotime($dateOld));
        $titulado = AlumnoTitulado::find($id)->update([
            'id_opcion_titulacion' => $request->get('opcion_titulacion'),
            'edad' => $request->get('edad'),
            'fecha_titulacion' => $formatedDate,
            'hora_titulacion' => $request->get('hora_titulacion'),
        ]);
        Session::flash('message', 'Alumno titulado actualizado con éxito!');
        return redirect()->route('titulados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlumnoTitulado  $alumnoTitulado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            AlumnoTitulado::find($id)->delete();
        } catch (QueryException $e) {
            Log::info('Excepción capturada: ');
            Log::info($e->getMessage());
            return redirect()->back()->with('error-message', 'Ocurrió un error con la base de datos');
        }
        Log::info('Deleted alumno titulado: '.$id);
        Session::flash('message', 'Alumno titulado borrado con éxito!');
        return redirect()->route('titulados.index');
    }
}
