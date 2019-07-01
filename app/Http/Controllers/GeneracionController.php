<?php

namespace App\Http\Controllers;

use App\Generacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Periodo;

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
        $splited = explode('-', $request->get('nombre'));
        if ($splited[1] - $splited[0] != 5) {
            Session::flash('error-message', 'Debe haber una diferencia de 5 entre los dos años');
            return back()->withInput();
        }
        $inicio = (int) substr($splited[0], 2);
        $this->addPeriodo( 'AG'.$this->str($inicio).'-EN'.$this->str($inicio + 1) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 1) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 1).'-EN'.$this->str($inicio + 2) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 2) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 2).'-EN'.$this->str($inicio + 3) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 3) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 3).'-EN'.$this->str($inicio + 4) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 4) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 4).'-EN'.$this->str($inicio + 5) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 5) );

        $generacion = Generacion::create([
            'nombre' => $request->get('nombre')
        ]);

        Session::flash('message', 'Generación creada con éxito!');
        return redirect()->route('generaciones.index');
    }

    private function addPeriodo($nombre) {
        $exists = Periodo::where('nombre', $nombre)->first();
        if (!$exists) {
            Periodo::create(['nombre' => $nombre ]);
        }
    }

    private function str($num) {
        if (strlen((string) $num) === 1) {
            return '0'.$num;
        } else {
            return $num;
        }
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
        $splited = explode('-', $request->get('nombre'));
        if ($splited[1] - $splited[0] != 5) {
            Session::flash('error-message', 'Debe haber una diferencia de 5 entre los dos años');
            return back()->withInput();
        }
        $inicio = (int) substr($splited[0], 2);
        $this->addPeriodo( 'AG'.$this->str($inicio).'-EN'.$this->str($inicio + 1) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 1) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 1).'-EN'.$this->str($inicio + 2) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 2) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 2).'-EN'.$this->str($inicio + 3) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 3) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 3).'-EN'.$this->str($inicio + 4) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 4) );
        $this->addPeriodo( 'AG'.$this->str($inicio + 4).'-EN'.$this->str($inicio + 5) );
        $this->addPeriodo( 'FEB-JUL'.$this->str($inicio + 5) );

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
