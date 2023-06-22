<div class="{{ $margin ?? '' }}">
  <label for="{{ $id ?? '' }}" class="block text-gray-600 text-sm font-bold mb-1">{{ $label ?? '' }}</label>
  <select 
    id="{{ $id ?? '' }}" 
    name="{{ $id ?? '' }}" 
    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
    onchange="{{ $onchange ?? '' }}"
    {{ $required ?? '' }}
  >{!! $slot !!}
  </select>
</div>