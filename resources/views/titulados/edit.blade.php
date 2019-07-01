@extends('template')

@section('title', 'Editar alumno titulado')

@section('content')

    <p class="opacity-75 uppercase tracking-wide font-bold text-lg text-center mx-16 mt-4 mb-2"><i class="fa fa-shopping-basket"></i> Editar alumno titulado</p>

    <div>
        <div class="px-4 pb-4 rounded-b w-full flex justify-center">
          <div class="w-1/2 bg-gray-100 p-4 shadow-md">
            {!! Form::open(['route' => array('titulados.update', $titulado->id),
                'method' => 'PUT',
                'files' => true]) !!}
                <div>
                    <label class="text-sm text-soft-black" for="numero_control">Número de control</label>
                    {!! Form::text('numero_control', $titulado->egresado->numero_control, array(
                        'class' => 'focus:bg-gray-200 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el número de control',
                        'disabled'
                    )) !!}
                </div>
                @error('numero_control')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-2">
                    <label class="text-sm text-soft-black" for="nombre">Nombre completo</label>
                    {!! Form::text('nombre', $titulado->egresado->nombre.' '.$titulado->egresado->apellido_paterno.' '.$titulado->egresado->apellido_materno, array(
                        'class' => 'focus:bg-gray-200 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el nombre',
                        'disabled'
                    )) !!}
                </div>
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-2">
                    <label class="text-sm text-soft-black" for="opcion_titulacion">Opción de titulación</label>
                    {!! Form::select('opcion_titulacion', $opciones, $titulado->id_opcion_titulacion, [
                        'class' => 'focus:bg-gray-200 bg-white mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Selecciona una opción de titulación...'
                    ]) !!}
                </div>
                @error('opcion_titulacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="edad">Edad</label>
                    {!! Form::text('edad', $titulado->edad, array(
                        'class' => 'focus:bg-gray-200 mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa la edad'
                    )) !!}
                </div>
                @error('edad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="fecha_titulacion">Fecha de titulación (día-mes-año, ejemplo: 15-02-2010)</label>
                    {!! Form::text('fecha_titulacion', date("d-m-Y", strtotime($titulado->fecha_titulacion)), array(
                        'class' => 'focus:bg-gray-200 mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa la fecha de titulación'
                    )) !!}
                </div>
                @error('fecha_titulacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="hora_titulacion">Hora de titulación (ejemplo: 15:36)</label>
                    {!! Form::text('hora_titulacion', $titulado->hora_titulacion, array(
                        'class' => 'focus:bg-gray-200 mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa la hora de titulación'
                    )) !!}
                </div>
                @error('hora_titulacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="sinodales">Sinodales (ingresar nombres completos, separados por una coma ',')</label>
                    {!! Form::text('sinodales', $sinodales, array(
                        'class' => 'focus:bg-gray-200 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa los sinodales'
                    )) !!}
                </div>
                @error('sinodales')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="my-4">
                    {!! Form::submit('Guardar', array(
                        'class' => 'rounded bg-teal-400 px-4 py-2 cursor-pointer hover:bg-teal-500'
                    )) !!}
                    <a href="{{ route('titulados.index') }}" class="text-soft-black rounded ml-2 px-4 py-2 hover:bg-gray-400">Cancelar</a>
                </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>

@endsection
