<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | Titulaciones · ITSTa</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="min-h-screen flex flex-col font-sans w-full h-full">
            <div class="flex-grow bg-gray-100">
                @include('sections.menu')
                @if (session('message'))
                    <div class="flex justify-center mt-2 mx-16">
                        <div class="p-2 bg-blue-700 items-center text-teal-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="font-semibold mr-2 text-left flex-auto ml-3 tracking-wide">{{ session('message') }}</span>
                        </div>
                    </div>
                @endif
                @if (session('error-message'))
                    <div class="flex justify-center mt-2 mx-16">
                        <div class="p-2 bg-red-700 items-center text-white leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="font-semibold mr-2 text-left flex-auto ml-3 tracking-wide">{{ session('error-message') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>

            @include('sections.footer')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script>
            function navToggle() {
                var nav = document.getElementById('menu-items');
                nav.classList.toggle('hidden');
            }
        </script>
    </body>
</html>
