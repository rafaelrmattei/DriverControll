<x-layout pageTitle="Gerentes" pageLabel="Editar gerente" navBarActive="managers">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('managers') }}"></x-links.blue>
  </x-slot:btns>  

  <x-forms.manager action="{{ route('managers.update') }}" method="POST" type="edit" :manager=$manager :managerDrivers=$managerDrivers :managerCities=$managerCities :managerVehicles=$managerVehicles :drivers=$drivers :cities=$cities :vehicles=$vehicles></x-forms.manager>

</x-layout>