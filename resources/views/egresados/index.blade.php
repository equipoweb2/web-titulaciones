@extends('template')

@section('title', 'Alumnos egresados')

@section('content')
    <div class="flex justify-between items-center mx-16 mt-4 mb-2">
        <p class="opacity-75 uppercase tracking-wider font-bold text-lg">
            <i class="fa fa-users"></i> Alumnos
        </p>
        <div>
          {!! Form::open(['route' => 'egresados.index', 'method' => 'GET']) !!}
            {!! Form::text('query', $query, array(
                'class' => 'bg-gray-200 focus:bg-white px-2 leading-tight appearance-none rounded h-10 w-100 border-2 border-teal-200',
                'placeholder' => ''
            )) !!}
            {!! Form::submit('Filtrar', array(
                'class' => 'rounded bg-teal-400 px-4 py-2 cursor-pointer hover:bg-teal-500'
            )) !!}
          {!! Form::close() !!}
        </div>
        <a href="{{route('egresados.create')}}" class="bg-yellow-500 px-4 py-2 rounded text-white hover:bg-yellow-600">
            Nuevo <i class="fa fa-plus-circle ml-1"></i>
        </a>
    </div>

    <div class="mx-16 mt-4 mb-8 flex">
        <div class="w-1/6 mr-1">
            <a href="{{ route('egresados.index') }}" class="bg-teal-200 text-gray-900 px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
                <i class="fa fa-user-graduate mr-1"></i> Egresados
            </a>
            <a href="{{ route('titulados.index') }}" class="text-gray-700 px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
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
                        <th scope="col" class="text-left">Fecha egreso</th>
                        <th scope="col" class="text-center">Promedio</th>
                        <th scope="col" class="text-left">Carrera</th>
                        <th scope="col" class="text-center">Generación</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($egresados as $egresado)
                    <tr>
                        <th scope="row" class="text-center">{{ $egresado->numero_control }}</th>
                        <td class="text-left">{{ $egresado->nombre }}</td>
                        <td class="text-left">{{ $egresado->apellido_paterno }} {{ $egresado->apellido_materno }}</td>
                        <td class="text-left">{{ $egresado->periodoEgreso->nombre }}</td>
                        <td class="text-center">{{ $egresado->promedio }}</td>
                        <td class="text-left">{{ $egresado->carrera->nombre }}</td>
                        <td class="text-center">{{ $egresado->generacion->nombre }}</td>
                        <td class="text-base">
                            <div class="flex flex-col items-center">
                                <a href="{{ route('egresados.edit', $egresado->id) }}" class="py-1 text-blue-600 hover:text-blue-800">
                                    Editar
                                </a>
                                {!! Form::open(array('url' => 'alumnos/egresados/' . $egresado->id, 'class' => '')) !!}
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
