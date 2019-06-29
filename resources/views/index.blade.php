@extends('template-bg-gray')

@section('title', 'Inicio')

@section('content')
<div class="mx-16 mt-4 mb-8 flex flex-col">
    <div class="flex mb-4">
        <div class="bg-white h-auto w-3/4 rounded-lg shadow-md border border-teal-500 mr-2">
            {!! $barChart->container() !!}
            {!! $barChart->script() !!}
        </div>
        <div class="bg-white h-auto w-1/4 rounded-lg shadow-md border border-teal-500 ml-2">
            {!! $totalChart->container() !!}
            {!! $totalChart->script() !!}
        </div>
    </div>

    <div class="flex">
        <div class="bg-white h-auto w-1/2 rounded-lg shadow-md border border-teal-500 mr-2">
            {!! $pieChart->container() !!}
            {!! $pieChart->script() !!}
        </div>
        <div class="bg-white h-auto w-1/2 rounded-lg shadow-md border border-teal-500 ml-2">
            {!! $tituladosPieChart->container() !!}
            {!! $tituladosPieChart->script() !!}
        </div>
    </div>

</div>

@endsection
