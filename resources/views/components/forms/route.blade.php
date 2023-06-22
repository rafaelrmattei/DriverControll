<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'POST' }}">  
  @csrf
  <x-inputs.input type="date" id="date" label="Data" required="required" value="{{ date('Y-m-d') }}" margin="mb-5"></x-inputs.input>  
  <x-inputs.select id="driver_id" label="Motorista" required="required" margin="mb-5">
    {!! count($drivers) > 1 ? '<option value="" selected disabled>Selecione...</option>' : '' !!}
    @foreach($drivers as $driver)
      <option value="{{ $driver->id }}" {{ count($drivers) == 1 ? 'selected' : '' }}>{{ $driver->name }}</option>
    @endforeach
  </x-inputs.select>
  <x-inputs.select id="vehicle_id" label="Veículo" required="required" margin="mb-5" onchange="fillKmInicial(this)">    
    {!! count($vehicles) > 1 ? '<option value="" selected disabled>Selecione...</option>' : '' !!}
    @foreach($vehicles as $vehicle)
      {{ count($vehicles) == 1 ? $km_inicial = $vehicle->routes()->latest()->first()->km_final : $km_inicial = '' }}
      <option value="{{ $vehicle->id }}" data-km="{{ $vehicle->routes()->latest()->first()->km_final ?? '' }}" {{ count($vehicles) == 1 ? 'selected' : '' }}>{{ $vehicle->plate }}</option>
    @endforeach
  </x-inputs.select>
  <x-inputs.select id="city_id" label="Cidade" required="required" margin="mb-5">
    {!! count($cities) > 1 ? '<option value="" selected disabled>Selecione...</option>' : '' !!}
    @foreach($cities as $city)
      <option value="{{ $city->id }}" {{ count($cities) == 1 ? 'selected' : '' }}>{{ $city->name }}</option>
    @endforeach
  </x-inputs.select>
  <x-inputs.input type="number" inputmode="numeric" id="km_initial" label="KM Inicial" required="required" value="{{ $km_inicial }}" margin="mb-5"></x-inputs.input>  
  <x-inputs.input type="number" inputmode="numeric" id="km_final" label="KM Final" required="required" margin="mb-5"></x-inputs.input> 
  <x-dynamicRowGroup.supplyGroup margin="mb-5"></x-dynamicRowGroup.supplyGroup>
  <x-dynamicRowGroup.expenseGroup margin="mb-5" :expenseTypes=$expenseTypes></x-dynamicRowGroup.expenseGroup>
  <x-buttons.blue type="submit" label="Salvar" contentAlign="justify-center lg:justify-start"></x-buttons.blue>
</form>

<div id="supply-model" class="hidden">
  <div id="supply-row-{x}" class="mb-2">
    <input name="supply[{x}]" type="number" inputmode="numeric" placeholder="Litros" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-[42%] sm:w-[45%] lg:w-[47%] mr-[1%] sm:mr-[0.9%] lg:mr-[0.7%]" required>
    <input name="price[{x}]" type="text" inputmode="numeric" placeholder="R$" onkeyup="maskMoney(this)" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-[42%] sm:w-[45%] lg:w-[47%]" required>
    <button type="button" class="w-[12%] sm:w-[8%] lg:w-[4%] float-right bg-red-700 rounded py-2 h-[38px] leading-tight text-white" onclick="removeSupply({x})">-</button>
  </div>
</div>

<div id="expense-model" class="hidden">
  <div id="expense-row-{x}" class="mb-1">
    <select name="expense_id[{x}]" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-[42%] sm:w-[45%] lg:w-[47%] mr-[1%] sm:mr-[0.9%] lg:mr-[0.7%] mb-2 invalid:text-gray-400" required>
      <option value="" selected disabled>Tipo...</option>
      @foreach($expenseTypes as $expenseType)
        <option value="{{ $expenseType->id }}">{{ $expenseType->name }}</option>
      @endforeach
    </select>
    <input name="value[{x}]" type="text" inputmode="numeric" placeholder="R$" onkeyup="maskMoney(this)" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-[42%] sm:w-[45%] lg:w-[47%]">
    <button type="button" class="w-[12%] sm:w-[8%] lg:w-[4%] float-right bg-red-700 rounded py-2 h-[38px] leading-tight text-white" onclick="removeExpense({x})">-</button>
    <textarea name="description[{x}]" type="number" placeholder="Descrição" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" required></textarea>
  </div>
</div>