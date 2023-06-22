<x-layout pageTitle="Gerentes" pageLabel="Novo gerente" navBarActive="managers">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('managers') }}"></x-links.blue>
  </x-slot:btns>  
  
  <x-forms.manager action="{{ route('managers.store') }}" method="POST" type="create" :managerDrivers=[] :managerCities=[] :managerVehicles=[] :drivers=$drivers :cities=$cities :vehicles=$vehicles></x-forms.manager>

</x-layout>