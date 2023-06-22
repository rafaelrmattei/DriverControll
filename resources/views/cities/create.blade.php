<x-layout pageTitle="Municípios" pageLabel="Novo município" navBarActive="cities">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('cities') }}"></x-links.blue>
  </x-slot:btns>  
  
  <x-forms.city action="{{ route('cities.store') }}" method="POST" type="create"></x-forms.city>

</x-layout>