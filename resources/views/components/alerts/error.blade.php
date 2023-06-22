@if ($errors->any())
  <div id="alert-errors" class="absolute z-20 w-60 right-6 top-20 lg:right-8 lg:top-8">
    <ul>
      @foreach ($errors->all() as $error)
        <li class="bg-red-300 border-red-700 border rounded-md text-red-900 p-3 transition-opacity duration-300 shadow-md mb-3 cursor-pointer" onclick="this.remove()">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
