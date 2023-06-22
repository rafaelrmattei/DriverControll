<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}">  
  @csrf
  {!! $type == 'edit' ? '<input type="hidden" name="id" value="'.$driver->id.'">' : '' !!}
  @if($type == 'create') @php $password_required = 'required="required"'; @endphp @else @php $password_required = ''; @endphp  @endif
  <x-inputs.input type="text" id="name" label="Nome" required="required" margin="mb-5" value="{{ old('name') !== null ? old('name') : $driver->name ?? '' }}" onkeyup="autoFillLoginPassword('{{ $type }}',this.value)" class="capitalize"></x-inputs.input>  
  <x-inputs.input type="text" id="email" label="Login" required="required" margin="mb-5" value="{{ old('email') !== null ? old('email') : $driver->login ?? '' }}" class="lowercase"></x-inputs.input>  
  <x-inputs.input type="text" id="password" label="Senha {{ $type == 'edit' ? '(Preencha para alterar)' : '' }}" value="{{ old('password') ?? '' }}" @php echo $password_required; @endphp margin="mb-5" class="lowercase"></x-inputs.input>  
  <x-inputs.select-multiple id="cities" label="Cidades de atuação" required="required" margin="mb-5">
    @foreach($cities as $city)
      <option value="{{ $city->id }}" {{ old('cities') !== null && in_array($city->id, old('cities')) ? 'selected' : ((old('cities') === null && in_array($city->id, $driverCities)) ? 'selected' : '') }}>{{ $city->name }}</option>
    @endforeach
  </x-inputs.select-multiple>
  <x-inputs.select-multiple id="vehicles" label="Veículos" required="required" margin="mb-5">
    @foreach($vehicles as $vehicle)
      <option value="{{ $vehicle->id }}" {{ old('vehicles') !== null && in_array($vehicle->id, old('vehicles')) ? 'selected' : ((old('cities') === null && in_array($vehicle->id, $driverVehicles)) ? 'selected' : '') }}>{{ $vehicle->plate }}</option>
    @endforeach
  </x-inputs.select-multiple>
  <x-buttons.blue type="submit" label="Salvar" contentAlign="justify-center lg:justify-start"></x-buttons.blue>
</form>