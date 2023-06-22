<x-layout pageTitle="Municípios" pageLabel="Editar município" navBarActive="cities">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('cities') }}"></x-links.blue>
  </x-slot:btns>  
  
  <x-forms.city action="{{ route('cities.update') }}" method="POST" type="edit" :data=$city></x-forms.city>

</x-layout>