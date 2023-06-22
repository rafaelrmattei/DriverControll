<x-layout pageTitle="Veículos" pageLabel="Editar veículo" navBarActive="vehicles">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('vehicles') }}"></x-links.blue>
  </x-slot:btns>  
  
  <x-forms.vehicle action="{{ route('vehicles.update') }}" method="POST" type="edit" :data=$vehicle></x-forms.vehicle>

</x-layout>