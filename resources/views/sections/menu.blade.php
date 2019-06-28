<nav class="flex items-center justify-between flex-wrap bg-teal-500 px-16 py-4">
  <div class="flex items-center flex-no-shrink text-white mr-6">
    <a href="/" class="font-semibold text-xl tracking-wider uppercase">Titulaciones</a>
  </div>
  <div class="block lg:hidden">
    <button onclick="navToggle();" class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div id="menu-items" class="w-full hidden block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="text-sm lg:flex-grow">
      @guest
      @else
      <!--<a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 no-underline">
        Perfiles
      </a>-->
      @endguest
    </div>

    <div class="md:inline-flex md:items-center">
        <!--<a href="/acerca-de" class="mx-2 no-underline font-sans text-gray-700 border-b-2 border-transparent hover:border-tertiary hover:text-black">
          Acerca de <i class="fa fa-info-circle ml-1"></i>
        </a>-->

        @guest
            <a href="{{ route('login') }}" class="mr-2 inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0 no-underline">
                {{ __('Iniciar sesión') }}
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0 no-underline">
                    {{ __('Regístrate') }}
                </a>
            @endif
        @else
            <a href="{{ route('alumnos') }}" class="block tracking-wide mt-4 lg:inline-block lg:mt-0 text-white hover:border-b-2 mr-4">
                Alumnos
            </a>
            <a href="{{ route('carreras.index') }}" class="block tracking-wide mt-4 lg:inline-block lg:mt-0 text-white hover:border-b-2 mr-4">
                Carreras
            </a>
            <a href="{{ route('opciones-titulacion.index') }}" class="block tracking-wide mt-4 lg:inline-block lg:mt-0 text-white hover:border-b-2 mr-4">
                Opciones de Titulación
            </a>
            <a href="{{ route('generaciones.index') }}" class="block tracking-wide mt-4 lg:inline-block lg:mt-0 text-white hover:border-b-2 mr-4">
                Generaciones
            </a>
            <a href="{{ route('periodos.index') }}" class="sm:mb-4 md:mb-0 block tracking-wide mt-4 lg:inline-block lg:mt-0 text-white hover:border-b-2 mr-10">
                Períodos
            </a>
            <div class="relative group">
                <div class="leading-none cursor-pointer bg-yellow-200 hover:shadow-md hover:border-gray-700 border p-1 rounded border-soft-black">
                    <div class="inline-flex">
                        <img class="inline-block w-8 h-8" src="/images/avatar.svg" alt="Avatar de {{ Auth::user()->name }}">
                        <div class="block flex items-center ml-2">
                            <span class="mr-1 font-semibold text-sm text-black tracking-wide">{{ Auth::user()->name }}</span>
                            <div>
                                <svg class="fill-current text-black h-4 w-4 block opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502a1.095 1.095 0 0 1-1.576 0S4.924 9.581 4.516 9.163c-.409-.418-.436-1.17 0-1.615z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded z-40 bg-yellow-200 shadow-md absolute mt-12 top-0 right-0 min-w-full invisible group-hover:visible">
                    <ul class="list-reset">
                        <li>
                            <a href="{{ route('logout') }}" class="rounded hover:bg-yellow-500 px-4 py-3 block no-underline text-soft-black"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt mr-2"></i>Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endguest

      </div>
    <!--<div>
      <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0 no-underline">Iniciar sesión</a>
    </div>-->
  </div>
</nav>
