<x-layout pageTitle="Rotas" pageLabel="Nova rota" navBarActive="routes">  
  
  <x-slot:btns>
    <x-links.blue label="Voltar" href="{{ route('routes') }}"></x-links.blue>
  </x-slot:btns>  

  <x-forms.route action="{{ route('routes.store') }}" method="POST" type="create" :cities=$cities :vehicles=$vehicles :drivers=$drivers :expenseTypes=$expenseTypes></x-forms.route>

</x-layout>