@extends('template-bg-gray')

@section('title', 'Agregar alumno egresado')

@section('content')

    <div class="w-full flex justify-center">
        <div class="mx-16 mt-4 mb-2 w-1/2 flex justify-between items-center">
            <p class="opacity-75 uppercase tracking-wider font-bold text-lg"><i class="fa fa-file-invoice-dollar"></i> Agregar alumno egresado</p>
            <div id="app">
                <import-excel-egresados></import-excel-egresados>
            </div>
        </div>
    </div>
    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

    <div>
        <div class="p-2 w-full flex justify-center mb-6">
          <div class="w-1/3 bg-gray-100 p-4 shadow-lg rounded-lg">
            {!! Form::open(['route' => 'egresados.store', 'files' => true]) !!}
                <div>
                    <label class="text-sm text-soft-black" for="numero_control">Número de control</label>
                    {!! Form::text('numero_control', null, array(
                        'class' => 'focus:bg-gray-200 mb-2 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el número de control'
                    )) !!}
                </div>
                @error('numero_control')
                    <span class="invalid-feedback mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="nombre">Nombre</label>
                    {!! Form::text('nombre', null, array(
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
                    {!! Form::text('apellido_paterno', null, array(
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
                    {!! Form::text('apellido_materno', null, array(
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
                    {!! Form::text('promedio', null, array(
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
                    {!! Form::select('carrera', $carreras, null, [
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
                    {!! Form::select('periodo_egreso', $periodos, null, [
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
                    {!! Form::select('generacion', $generaciones, null, [
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
