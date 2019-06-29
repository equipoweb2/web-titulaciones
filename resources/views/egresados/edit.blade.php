@extends('template')

@section('title', 'Editar alumno egresado')

@section('content')

    <p class="opacity-75 uppercase tracking-wide font-bold text-lg text-center mx-16 my-4"><i class="fa fa-shopping-basket"></i> Editar alumno egresado</p>

    <div>
        <div class="p-4 rounded-b w-full flex justify-center">
          <div class="w-1/3 bg-gray-100 p-4 shadow-md">
            {!! Form::open(['route' => array('egresados.update', $egresado->id),
                'method' => 'PUT',
                'files' => true]) !!}
                <div>
                    <label class="text-sm text-soft-black" for="numero_control">Número de control</label>
                    {!! Form::text('numero_control', $egresado->numero_control, array(
                        'class' => 'focus:bg-gray-200 disabled mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el número de control',
                        'disabled'
                    )) !!}
                </div>
                @error('numero_control')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="nombre">Nombre</label>
                    {!! Form::text('nombre', $egresado->nombre, array(
                        'class' => 'focus:bg-gray-200 mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el nombre'
                    )) !!}
                </div>
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="apellido_paterno">Apellido paterno</label>
                    {!! Form::text('apellido_paterno', $egresado->apellido_paterno, array(
                        'class' => 'focus:bg-gray-200 mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el apellido paterno'
                    )) !!}
                </div>
                @error('apellido_paterno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="apellido_materno">Apellido materno</label>
                    {!! Form::text('apellido_materno', $egresado->apellido_materno, array(
                        'class' => 'focus:bg-gray-200 mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el apellido materno'
                    )) !!}
                </div>
                @error('apellido_materno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="promedio">Promedio</label>
                    {!! Form::text('promedio', $egresado->promedio, array(
                        'class' => 'focus:bg-gray-200x px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el promedio'
                    )) !!}
                </div>
                @error('promedio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-2">
                    <label class="text-sm text-soft-black" for="carrera">Carrera</label>
                    {!! Form::select('carrera', $carreras, $egresado->id_carrera, [
                        'class' => 'focus:bg-grey-lighter px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-primary-lightest',
                        'placeholder' => 'Selecciona una carrera...'
                    ]) !!}
                </div>
                @error('carrera')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-2">
                    <label class="text-sm text-soft-black" for="periodo_egreso">Período de egreso</label>
                    {!! Form::select('periodo_egreso', $periodos, $egresado->id_periodo_egreso, [
                        'class' => 'focus:bg-grey-lighter px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-primary-lightest',
                        'placeholder' => 'Selecciona un período de egreso...'
                    ]) !!}
                </div>
                @error('periodo_egreso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-2">
                    <label class="text-sm text-soft-black" for="generacion">Generación</label>
                    {!! Form::select('generacion', $generaciones, $egresado->id_generacion, [
                        'class' => 'focus:bg-grey-lighter mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-primary-lightest',
                        'placeholder' => 'Selecciona una generación...'
                    ]) !!}
                </div>
                @error('generacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="my-4">
                    {!! Form::submit('Guardar', array(
                        'class' => 'rounded bg-teal-400 px-4 py-2 cursor-pointer hover:bg-teal-500'
                    )) !!}
                    <a href="{{ route('egresados.index') }}" class="text-soft-black rounded ml-2 px-4 py-2 hover:bg-gray-400">Cancelar</a>
                </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>

@endsection
