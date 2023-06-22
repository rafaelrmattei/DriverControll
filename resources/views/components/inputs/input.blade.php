<div class="{{ $margin ?? '' }}">
  @if(isset($label)) <label for="{{ $id ?? '' }}" class="block text-gray-600 text-sm font-bold mb-1">{{ $label ?? '' }}</label> @endif
  @if(!isset($type)) @php $type = '' @endphp @endif
  <input 
    id="{{ $id ?? '' }}" 
    name="{{ $id ?? '' }}" 
    type="{{ $type ?? 'text' }}" 
    value="{{ $value ?? '' }}" 
    placeholder="{{ $placeholder ?? '' }}"
    onkeyup="{{ $onkeyup ?? '' }}"
    inputmode="{{ (($type === 'email') ? 'email' : ($type === 'number')) ? 'numeric' : '' }}"
    {{ $required ?? '' }}
    {{ $autofocus ?? '' }}   
    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $class ?? '' }}"
  >
</div>