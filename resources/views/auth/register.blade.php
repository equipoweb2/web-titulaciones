@extends('template')

@section('title', 'Regístrate')

@section('content')
<div class="flex justify-center mt-6 mb-8">
    <div class="w-1/2 max-w-md xl:max-w-3xl mx-auto flex bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="hidden xl:block w-1/2 bg-cover bg-center" style="background-image: url('images/register.jpg');"></div>
        <div class="w-full xl:w-1/2 p-8">
            {!! Form::open(['route' => 'register', 'method' => 'POST', 'files' => true]) !!}
                @csrf
                <h1 class="text-2xl font-bold">Regístrate</h1>
                <div class="mt-5">
                    <label class="text-sm text-soft-black font-bold" for="nombre">Nombre</label>
                    {!! Form::text('name', null, array(
                        'class' => 'bg-gray-200 text-gray-900 mt-1 px-2 leading-tight appearance-none w-full rounded h-8 focus:border-2 focus:border-teal-300',
                        'placeholder' => 'Tu nombre'
                    )) !!}
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-3">
                    <label class="text-sm text-soft-black font-bold" for="nombre">Email</label>
                    {!! Form::text('email', null, array(
                        'class' => 'bg-gray-200 text-gray-900 mt-1 px-2 leading-tight appearance-none w-full rounded h-8 focus:border-2 focus:border-teal-300',
                        'placeholder' => 'Tu correo electrónico'
                    )) !!}
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-3">
                    <label class="text-sm text-soft-black font-bold" for="password">Password</label>
                    {!! Form::password('password', array(
                        'class' => 'bg-gray-200 text-gray-900 mt-1 px-2 leading-tight appearance-none w-full rounded h-8 focus:border-2 focus:border-teal-300',
                        'placeholder' => 'Tu contraseña'
                    )) !!}
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-3 mb-2">
                    <label class="text-sm text-soft-black font-bold" for="password_confirmation">Confirma password</label>
                    {!! Form::password('password_confirmation', array(
                        'class' => 'bg-gray-200 text-gray-900 mt-1 px-2 leading-tight appearance-none w-full rounded h-8 focus:border-2 focus:border-teal-300',
                        'placeholder' => 'Confirma tu contraseña'
                    )) !!}
                </div>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mt-8">
                    {!! Form::submit('Sign up', array(
                        'class' => 'w-full rounded py-2 bg-soft-black text-white cursor-pointer'
                    )) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
