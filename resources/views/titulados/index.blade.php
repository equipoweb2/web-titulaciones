@extends('template')

@section('title', 'Alumnos titulados')

@section('content')
    <div class="flex justify-between items-center mx-16 mt-4 mb-2">
        <p class="opacity-75 uppercase tracking-wider font-bold text-lg">
            <i class="fa fa-users"></i> Alumnos
        </p>
        <!--
        <div>
          {!! Form::open(['route' => 'titulados.index', 'method' => 'GET']) !!}
            {!! Form::text('query', $query, array(
                'class' => 'bg-gray-200 focus:bg-white px-2 leading-tight appearance-none rounded h-10 w-100 border-2 border-teal-200',
                'placeholder' => ''
            )) !!}
            {!! Form::submit('Filtrar', array(
                'class' => 'rounded bg-teal-400 px-4 py-2 cursor-pointer hover:bg-teal-500'
            )) !!}
          {!! Form::close() !!}
        </div>
        -->
        <a href="{{route('titulados.create')}}" class="bg-yellow-500 px-4 py-2 rounded text-white hover:bg-yellow-600">
            Nuevo <i class="fa fa-plus-circle ml-1"></i>
        </a>
    </div>

    <div class="mx-16 mt-4 mb-8 flex">
        <div class="w-1/6 mr-1">
            <a href="{{ route('egresados.index') }}" class="text-gray-700 px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
                <i class="fa fa-user-graduate mr-1"></i> Egresados
            </a>
            <a href="{{ route('titulados.index') }}" class="bg-teal-200 text-gray-900 px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
                <i class="fa fa-award mr-1"></i> Titulados
            </a>
        </div>
        <div class="w-5/6 ml-1 mt-2">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Núm. control</th>
                        <th scope="col" class="text-left">Nombre</th>
                        <th scope="col" class="text-left">Apellidos</th>
                        <th scope="col" class="text-center">Edad</th>
                        <th scope="col" class="text-left">Carrera</th>
                        <th scope="col" class="text-left">Opción de titulación</th>
                        <th scope="col" class="text-left">Fecha</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($titulados as $titulado)
                    <tr>
                        <th scope="row" class="text-center">{{ $titulado->egresado->numero_control }}</th>
                        <td class="text-left">{{ $titulado->egresado->nombre }}</td>
                        <td class="text-left">{{ $titulado->egresado->apellido_paterno }} {{ $titulado->egresado->apellido_materno }}</td>
                        <td class="text-center">{{ $titulado->edad }}</th>
                        <td class="text-left">{{ $titulado->egresado->carrera->nombre }}</td>
                        <td class="text-left">{{ $titulado->opcionTitulacion->nombre }}</td>
                        <td class="text-left">{{ date("d-m-Y", strtotime($titulado->fecha_titulacion)) }}</td>
                        <td class="text-base">
                            <div class="flex flex-col items-center">
                                <a href="{{ route('titulados.edit', $titulado->id) }}" class="py-1 text-blue-600 hover:text-blue-800">
                                    Editar
                                </a>
                                {!! Form::open(array('url' => 'alumnos/titulados/' . $titulado->id, 'class' => '')) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="ml-2 text-red-600 hover:text-red-800">
                                        Eliminar
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
