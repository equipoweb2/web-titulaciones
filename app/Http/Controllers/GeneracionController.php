<?php

namespace App\Http\Controllers;

use App\Generacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class GeneracionController extends Controller
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
        $generaciones = Generacion::all();
        return view('generaciones.index', compact('generaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generaciones.create');
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
            'nombre' => 'required|max:255|unique:generacions|regex:/^\d{4}[-]\d{4}$/'
        ]);
        $generacion = Generacion::create([
            'nombre' => $request->get('nombre')
        ]);
        Session::flash('message', 'Generación creada con éxito!');
        return redirect()->route('generaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Generacion  $generacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Generacion  $generacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $generacion = Generacion::find($id);
        return view('generaciones.edit')
            ->with('generacion', $generacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Generacion  $generacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255|unique:generacions|regex:/^\d{4}[-]\d{4}$/'
        ]);
        $generacion = Generacion::find($id)->update([
            'nombre' => $request->get('nombre')
        ]);
        Session::flash('message', 'Generación actualizada con éxito!');
        return redirect()->route('generaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Generacion  $generacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Generacion::find($id)->delete();
        } catch (QueryException $e) {
            Log::info('Excepción capturada: ');
            Log::info($e->getMessage());
            return redirect()->back()->with('error-message', 'Ocurrió un error con la base de datos');
        }
        Log::info('Deleted generación: '.$id);
        Session::flash('message', 'Generación borrada con éxito!');
        return redirect()->route('generaciones.index');
    }
}
