<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PeriodoController extends Controller
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
        $periodos = Periodo::all();
        return view('periodos.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodos.create');
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
            'nombre' => [ 'required', 'max:255', 'unique:periodos',
                'regex:/^((FEB-JUL\d{2})|(AG\d{2}-EN\d{2}))$/'
            ],
        ]);
        $periodo = Periodo::create([
            'nombre' => $request->get('nombre')
        ]);
        Session::flash('message', 'Período creado con éxito!');
        return redirect()->route('periodos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo = Periodo::find($id);
        return view('periodos.edit')
            ->with('periodo', $periodo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => [ 'required', 'max:255', 'unique:periodos',
                'regex:/^((FEB-JUL\d{2})|(AG\d{2}-EN\d{2}))$/'
            ],
        ]);
        $periodo = Periodo::find($id)->update([
            'nombre' => $request->get('nombre')
        ]);
        Session::flash('message', 'Perído actualizado con éxito!');
        return redirect()->route('periodos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Periodo::find($id)->delete();
        } catch (QueryException $e) {
            Log::info('Excepción capturada: ');
            Log::info($e->getMessage());
            return redirect()->back()->with('error-message', 'Ocurrió un error con la base de datos');
        }
        Log::info('Deleted período: '.$id);
        Session::flash('message', 'Período borrado con éxito!');
        return redirect()->route('periodos.index');
    }
}
