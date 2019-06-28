@extends('template')

@section('title', 'Alumnos')

@section('content')
    <div class="mx-16 mt-4 mb-8 flex">
        <div class="w-1/6 mr-1">
            <p class="opacity-75 px-2 uppercase tracking-wider font-bold text-lg">
                Alumnos
            </p>
            <a href="{{ route('egresados.index') }}" class="{{ 7 == 5 ? 'bg-teal-200 text-gray-900' : 'text-gray-700' }} px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
                <i class="fa fa-user-graduate mr-1"></i> Egresados
            </a>
            <a href="/#" class="{{ 5 == 5 ? 'bg-teal-200 text-gray-900' : 'text-gray-700' }} px-2 py-2 rounded relative block hover:bg-teal-200 hover:text-gray-900 font-medium no-underline">
                <i class="fa fa-award mr-1"></i> Titulados
            </a>
        </div>
        <div class="w-5/6 ml-1"></div>
    </div>
@endsection
