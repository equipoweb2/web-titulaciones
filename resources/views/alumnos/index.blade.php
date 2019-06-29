@extends('template')

@section('title', 'Alumnos')

@section('content')
    <div class="mx-16 mt-4 mb-8 flex">
        <div class="w-1/6 mr-1">
            <p class="opacity-75 px-2 uppercase tracking-wider font-bold text-lg">
                Alumnos
            </p>
            <a href="{{ route('egresados.index') }}" class="text-gray-700 hover:bg-teal-200 hover:text-gray-900 px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
                <i class="fa fa-user-graduate mr-1"></i> Egresados
            </a>
            <a href="{{ route('titulados.index') }}" class="text-gray-700 hover:bg-teal-200 hover:text-gray-900 px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
                <i class="fa fa-award mr-1"></i> Titulados
            </a>
        </div>
        <div class="w-5/6 ml-1">
            <table class="table table-responsive">
                <thead>
                    <tr></tr>
                </thead>
                <tbody>
                <?php $currentCarrera = ""; ?>

                @foreach ($data as $row)
                    @if ($currentCarrera === $row->carrera)
                    @else
                    <tr>
                        <td class="text-center bg-gray-300">{{ $row->carrera }}</td>
                        <td class="text-center bg-gray-300">Egresados</td>
                        <td class="text-center bg-gray-300">Titulados</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="text-center">Generación {{ $row->generacion }}</td>
                        <td class="text-center">{{ $row->egresados }}</td>
                        <td class="text-center">{{ $row->titulados }}</td>
                    </tr>

                    @php $currentCarrera = $row->carrera; @endphp

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
