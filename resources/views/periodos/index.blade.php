@extends('template')

@section('title', 'Períodos')

@section('content')

    <div class="flex justify-between items-center mx-16 my-4">
        <p class="opacity-75 uppercase tracking-wider font-bold text-lg">
            <i class="fa fa-file-invoice-dollar mr-1"></i> Períodos
        </p>
        <a href="{{ route('periodos.create') }}" class="bg-yellow-500 px-4 py-2 rounded text-gray-700 hover:bg-yellow-600">
            Agregar <i class="fa fa-plus-circle ml-1"></i>
        </a>
    </div>

    <div class="mx-16 mb-8">
     <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($periodos as $periodo)
            <tr>
                <th scope="row" class="text-center">{{ $periodo->id }}</th>
                <td class="text-center">{{ $periodo->nombre }}</td>
                <td class="text-base">
                    <div class="flex items-center">
                        <a href="{{ route('periodos.edit', $periodo->id) }}" class="pr-2 border-r border-gray-500 text-blue-600 hover:text-blue-800">
                            Editar
                        </a>
                        {!! Form::open(array('url' => 'periodos/' . $periodo->id, 'class' => '')) !!}
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
@endsection
