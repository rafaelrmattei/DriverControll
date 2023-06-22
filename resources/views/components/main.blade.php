<main class="w-full lg:h-screen lg:max-h-screen overflow-auto p-6 lg:p-8 relative">
  
  @if(isset($pageLabel) && !empty($pageLabel))
    <div class="flex justify-between">
      <h1 class="text-blue-400 font-bold text-2xl lg:text-3xl mb-5 mr-2">{{ $pageLabel }}</h1>
      <div class="flex">
        {!! $inputs ?? null !!}
        {!! $btns ?? null !!}
      </div>
    </div>
  @endif
  
  <div>{{ $slot }}</div>

</nav>