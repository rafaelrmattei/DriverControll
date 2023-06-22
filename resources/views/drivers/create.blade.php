<x-layout pageTitle="Motoristas" pageLabel="Novo motorista" navBarActive="drivers">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('drivers') }}"></x-links.blue>
  </x-slot:btns>  
  
  <x-forms.driver action="{{ route('drivers.store') }}" method="POST" type="create" :driverCities=[] :driverVehicles=[] :cities=$cities :vehicles=$vehicles></x-forms.driver>

</x-layout>