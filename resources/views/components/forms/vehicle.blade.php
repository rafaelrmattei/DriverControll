<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}">  
  @csrf
  {!! $type == 'edit' ? '<input type="hidden" name="id" value="'.$data->id.'">' : '' !!}
  <x-inputs.input type="text" id="plate" label="Placa" required="required" margin="mb-5" value="{{ $data->plate ?? '' }}" class="uppercase"></x-inputs.input>
  <x-buttons.blue type="submit" label="Salvar" contentAlign="justify-center lg:justify-start"></x-buttons.blue>
</form>