<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CarreraController extends Controller
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
        return view('carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carreras.create');
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
            'nombre' => 'required|max:255|unique:carreras',
            'clave' => 'required|max:255|unique:carreras'
        ]);
        $carrera = Carrera::create([
            'nombre' => $request->get('nombre'),
            'clave' => $request->get('clave')
        ]);
        Session::flash('message', 'Carrera creada con éxito!');
        return redirect()->route('carreras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera = Carrera::find($id);
        return view('carreras.edit')
            ->with('carrera', $carrera);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255|unique:carreras',
            'clave' => 'required|max:255|unique:carreras'
        ]);
        $opcion = Carrera::find($id)->update([
            'nombre' => $request->get('nombre'),
            'clave' => $request->get('clave')
        ]);
        Session::flash('message', 'Carrera actualizada con éxito!');
        return redirect()->route('carreras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Carrera::find($id)->delete();
        } catch (QueryException $e) {
            Log::info('Excepción capturada: ');
            Log::info($e->getMessage());
            return redirect()->back()->with('error-message', 'Ocurrió un error con la base de datos');
        }
        Log::info('Deleted carrera: '.$id);
        Session::flash('message', 'Carrera borrada con éxito!');
        return redirect()->route('carreras.index');
    }
}
