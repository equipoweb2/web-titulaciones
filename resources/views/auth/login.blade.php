@extends('template')

@section('title', 'Inicio de sesión')

@section('content')
<div class="flex justify-center mt-8">
    <div class="w-1/2 max-w-md xl:max-w-3xl mx-auto flex bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="hidden xl:block w-1/2 bg-cover bg-center" style="background-image: url('images/login.jpg');"></div>
        <div class="w-full xl:w-1/2 p-8">
            {!! Form::open(['route' => 'login', 'method' => 'POST', 'files' => true]) !!}
                <h1 class="text-2xl font-bold">Ingresa a tu cuenta</h1>
                <p class="text-md text-gray-800 mt-1">¿No tienes una cuenta? <a href="{{ route('register') }}" class="no-underline text-soft-black font-bold hover:text-black">Regístrate</a></p>
                <div class="mt-5">
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
                <div class="mt-4 mb-2">
                    <label class="text-sm text-soft-black font-bold" for="nombre">Password</label>
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
                <div class="mt-8">
                    {!! Form::submit('Inicia sesión', array(
                        'class' => 'w-full rounded py-2 bg-teal-500 text-white cursor-pointer'
                    )) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
