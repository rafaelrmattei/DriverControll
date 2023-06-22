@if(!$navBar)
  <nav class="flex h-10vh lg:h-screen w-screen lg:w-7vw p-3 lg:px-5 lg:py-6 overflow-hidden bg-login-background bg-[left_calc(8%)_top_calc(50px)] bg-cover bg-no-repeat relative shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]">
    <div class="w-screen h-screen absolute top-0 left-0 bg-white/40 bg-gradient-to-b from-blue-400 via-green-400 to-transparent z-1"></div>
    <div class="flex justify-between w-full lg:block lg:text-center z-10">
      <div><img src="{{ asset('img/logo-1.svg') }}" class="max-h-full"></div>
      <div class="flex items-center lg:block lg:pt-8 lg:px-2 2xl:px-3">
        <div class="flex justify-center lg:mb-4">
          <a href="{{ route('routes') }}" class="mr-4 lg:mr-0 lg:flex lg:justify-center lg:rounded-md lg:p-[5px] lg:shadow-lg {{ $navBarActive == 'routes' ? 'lg:bg-green-400' : 'lg:bg-white' }}" title="Rotas">
            <img src="{{ asset('img/route.svg') }}" alt="Rotas" class="{{ $navBarActive == 'routes' ? 'brightness-[1] lg:brightness-[4]' : 'brightness-[4] lg:brightness-[1]' }} 2xl:p-[5px] max-h-8 lg:max-h-none">
          </a>
        </div>
        @can('isAdmin')
          <div class="flex justify-center lg:mb-4">
            <a href="{{ route('drivers') }}" class="lg:flex lg:justify-center lg:rounded-md lg:p-[5px] lg:shadow-lg {{ $navBarActive == 'drivers' ? 'lg:bg-green-400' : 'lg:bg-white' }}" title="Motoristas">
              <img src="{{ asset('img/wheel.svg') }}" alt="Motoristas" class="{{ $navBarActive == 'drivers' ? 'brightness-[1] lg:brightness-[4]' : 'brightness-[4] lg:brightness-[1]' }} 2xl:p-[5px] max-h-8 lg:max-h-none">
            </a>
          </div>
          <div class="flex justify-center lg:mb-4">
            <a href="{{ route('vehicles') }}" class="ml-4 lg:ml-0 lg:flex lg:justify-center lg:rounded-md lg:p-[5px] lg:shadow-lg {{ $navBarActive == 'vehicles' ? 'lg:bg-green-400' : 'lg:bg-white' }}" title="Veículos">
              <img src="{{ asset('img/truck.svg') }}" alt="Veículos" class="{{ $navBarActive == 'vehicles' ? 'brightness-[1] lg:brightness-[4]' : 'brightness-[4] lg:brightness-[1]' }} 2xl:p-[5px] max-h-8 lg:max-h-none">
            </a>
          </div>
          <div class="flex justify-center lg:mb-6">
            <a href="{{ route('cities') }}" class="ml-4 mr-3 lg:ml-0 lg:mr-0 lg:flex lg:justify-center lg:rounded-md lg:p-[4px] lg:shadow-lg {{ $navBarActive == 'cities' ? 'lg:bg-green-400' : 'lg:bg-white' }}" title="Municípios">
              <img src="{{ asset('img/city.svg') }}" alt="Municípios" class="{{ $navBarActive == 'cities' ? 'brightness-[1] lg:brightness-[4]' : 'brightness-[4] lg:brightness-[1]' }} 2xl:p-[5px] max-h-8 lg:max-h-none">
            </a>
          </div>
        @endcan
        <div>
          <a href="{{ route('logout') }}" class="lg:flex lg:justify-center" title="Sair">
            <img src="{{ asset('img/exit.svg') }}" alt="Sair" class="brightness-[4] p-[5px] max-h-7 lg:max-h-none">
          </a>
        </div>
      </div>
    </div>
  </nav>
@endif