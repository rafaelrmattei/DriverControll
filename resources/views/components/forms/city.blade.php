<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}">  
  @csrf
  {!! $type == 'edit' ? '<input type="hidden" name="id" value="'.$data->id.'">' : '' !!}
  <x-inputs.input type="text" id="name" label="Nome" required="required" margin="mb-5" value="{{ $data->name ?? '' }}" class="capitalize"></x-inputs.input>
  <x-buttons.blue type="submit" label="Salvar" contentAlign="justify-center lg:justify-start"></x-buttons.blue>
</form>