<x-layout pageTitle="Veículos" pageLabel="Novo veículo" navBarActive="vehicles">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('vehicles') }}"></x-links.blue>
  </x-slot:btns>  
  
  <x-forms.vehicle action="{{ route('vehicles.store') }}" method="POST" type="create"></x-forms.vehicle>

</x-layout>