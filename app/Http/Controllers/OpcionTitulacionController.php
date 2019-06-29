<?php

namespace App\Http\Controllers;

use App\OpcionTitulacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class OpcionTitulacionController extends Controller
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
    public function index() {
        $opciones = OpcionTitulacion::all();
        return view('opcion-titulacion.index', compact('opciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opcion-titulacion.create');
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
            'nombre' => 'required|max:255|unique:opcion_titulacions'
        ]);
        $opcion = OpcionTitulacion::create([
            'nombre' => $request->get('nombre')
        ]);
        Session::flash('message', 'Opción de titulación creada con éxito!');
        return redirect()->route('opciones-titulacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OpcionTitulacion  $opcionTitulacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OpcionTitulacion  $opcionTitulacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opcion = OpcionTitulacion::find($id);
        return view('opcion-titulacion.edit')
            ->with('opcion', $opcion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OpcionTitulacion  $opcionTitulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255|unique:opcion_titulacions'
        ]);
        $opcion = OpcionTitulacion::find($id)->update([
            'nombre' => $request->get('nombre')
        ]);
        Session::flash('message', 'Opción de titulación actualizada con éxito!');
        return redirect()->route('opciones-titulacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OpcionTitulacion  $opcionTitulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            OpcionTitulacion::find($id)->delete();
        } catch (QueryException $e) {
            Log::info('Excepción capturada: ');
            Log::info($e->getMessage());
            return redirect()->back()->with('error-message', 'Ocurrió un error con la base de datos');
        }
        Log::info('Deleted opción: '.$id);
        Session::flash('message', 'Opción de titulación borrada con éxito!');
        return redirect()->route('opciones-titulacion.index');
    }
}
