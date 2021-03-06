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
                <?php $currentCarrera = "";
                    $colors = ['red', 'blue', 'green', 'teal', 'yellow', 'orange', 'pink', 'gray', 'indigo', 'purple'];
                    $bgColors = ['bg-red-400', 'bg-blue-400', 'bg-green-400', 'bg-teal-400', 'bg-yellow-400', 'bg-orange-400', 'bg-pink-400', 'bg-gray-400', 'bg-indigo-400', 'bg-purple-400'];
                    $hoverColors = ['hover:bg-red-200', 'hover:bg-blue-200', 'hover:bg-green-200', 'hover:bg-teal-200', 'hover:bg-yellow-200', 'hover:bg-orange-200', 'hover:bg-pink-200', 'hover:bg-gray-200', 'hover:bg-indigo-200', 'hover:bg-purple-200'];
                    $color = array_rand($colors);
                ?>

                @foreach ($data as $row)
                    @if ($currentCarrera === $row->carrera)
                    @else
                    @php $color = array_rand($colors); @endphp
                        <tr class="pt-8 border-t-2">
                            <td class="text-center {{ $bgColors[$color] }}">{{ $row->carrera }}</td>
                            <td class="text-center {{ $bgColors[$color] }}">Egresados</td>
                            <td class="text-center {{ $bgColors[$color] }}">Titulados</td>
                            <td class="text-center {{ $bgColors[$color] }}">Diferencia</td>
                            <td class="text-center {{ $bgColors[$color] }}">Porcentaje</td>
                        </tr>

                    @endif
                        <tr class="{{ $hoverColors[$color] }}">
                            <td class="text-center">Generación {{ $row->generacion }}</td>
                            <td class="text-center">{{ $row->egresados }}</td>
                            <td class="text-center">{{ $row->titulados }}</td>
                            <td class="text-center">{{ number_format($row->titulados / $row->egresados, 3) }}</td>
                            <td class="text-center">{{ number_format($row->titulados * 100 / $row->egresados, 2) }} %</td>
                        </tr>

                    @php $currentCarrera = $row->carrera; @endphp

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
