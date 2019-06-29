@extends('template')

@section('title', 'Agregar carrera')

@section('content')

    <p class="opacity-75 uppercase tracking-wide font-bold text-lg text-center mx-16 my-4"><i class="fa fa-file-invoice-dollar"></i> Agregar carrera</p>

    <div>
        <div class="p-4 rounded-b w-full flex justify-center">
          <div class="w-1/3 bg-gray-100 p-4 shadow-md">
            {!! Form::open(['route' => 'carreras.store', 'files' => true]) !!}
                <div>
                    <label class="text-sm text-soft-black" for="clave">Clave</label>
                    {!! Form::text('clave', null, array(
                        'class' => 'focus:bg-gray-200 mt-1 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa la clave de carrera'
                    )) !!}
                </div>
                @error('clave')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                    <label class="text-sm text-soft-black" for="nombre">Nombre</label>
                    {!! Form::text('nombre', null, array(
                        'class' => 'focus:bg-gray-200 mt-1 px-2 leading-tight appearance-none w-full rounded h-8 border-2 border-teal-200',
                        'placeholder' => 'Ingresa el nombre'
                    )) !!}
                </div>
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="my-4">
                    {!! Form::submit('Guardar', array(
                        'class' => 'rounded bg-teal-400 px-4 py-2 cursor-pointer hover:bg-teal-500'
                    )) !!}
                    <a href="{{ route('carreras.index') }}" class="text-soft-black rounded ml-2 px-4 py-2 hover:bg-gray-400">Cancelar</a>
                </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>

@endsection
