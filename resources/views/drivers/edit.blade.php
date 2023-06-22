<x-layout pageTitle="Motoristas" pageLabel="Editar motorista" navBarActive="drivers">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('drivers') }}"></x-links.blue>
  </x-slot:btns>  

  <x-forms.driver action="{{ route('drivers.update') }}" method="POST" type="edit" :driver=$driver :driverCities=$driverCities :driverVehicles=$driverVehicles :cities=$cities :vehicles=$vehicles></x-forms.driver>

</x-layout>