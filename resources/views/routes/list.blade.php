<x-layout pageTitle="Rotas" pageLabel="Rotas" navBarActive="routes">  

  <x-slot:inputs>
    <x-inputs.input margin="mr-2" class="h-[32px] text-xs lg:text-sm" placeholder="Buscar rota..." onkeyup="tableSearch('table-routes',this.value)"></x-inputs.input>
  </x-slot:inputs> 

  <x-slot:btns>
    <x-links.blue label="Nova" href="{{ route('routes.create') }}"></x-links.blue>
  </x-slot:btns> 

  <div>
    <div class="relative overflow-x-auto shadow-md rounded">
      <table id="table-routes" class="w-full text-sm text-left text-gray-400">
        <thead class="text-blue-700 uppercase bg-blue-100">
          <tr>
            <th scope="col" class="px-6 py-4">Data</th>
            <th scope="col" class="px-6 py-4">Veículo</th>
            @can('isAdmin') 
              <th scope="col" class="px-6 py-4">Motorista</th>
            @endcan
            <th scope="col" class="px-6 py-4">Cidade</th>
            <th scope="col" class="px-6 py-4">Inicio</th>
            <th scope="col" class="px-6 py-4">Fim</th>
            @can('isAdmin') 
              <th scope="col" class="px-6 py-4 text-right">Ações</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach ($routes as $route)
            <tr class="dark:bg-blue-50 hover:bg-blue-300 dark:hover:bg-blue-300 text-gray-600 hover:text-blue-50 transition-colors font-medium">
              <td scope="row" class="px-6 py-4 whitespace-nowrap font-bold">{{ date('d/m/Y', strtotime($route->date)) }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $route->vehicle->plate }}</td>
              @can('isAdmin') 
                <td class="px-6 py-4 whitespace-nowrap">{{ $route->driver->name }}</td> 
              @endcan
              <td class="px-6 py-4 whitespace-nowrap">{{ $route->city->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $route->km_initial }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $route->km_final }}</td>              
              @can('isAdmin')
                <td class="px-6 py-4 text-right">                
                  @if($route->expenses->count() > 0) <a href="javascript: toggleModal('modal-expenses','{{ $route->id }}')" class="font-medium text-blue-400 hover:text-blue-50 transition-colors" data-modal-target="defaultModal" data-modal-toggle="defaultModal">Despesas</a> @endif
                  <a href="{{ route('routes.destroy', $route->id) }}" class="font-medium text-blue-400 hover:text-blue-50 transition-colors ml-3" onclick="return confirm('Confirma a exclusão desta rota?');">Excluir</a>
                </td>
                @if($route->expenses->count() > 0)
                  <td id="route-{{ $route->id }}" class="hidden">
                    <div class="relative overflow-x-auto shadow-md rounded scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-blue-50 scrollbar-rounded-*">
                      <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-blue-700 uppercase bg-blue-100">
                          <tr>
                            <th scope="col" class="px-6 py-4">Tipo</th>
                            <th scope="col" class="px-6 py-4">Valor</th>
                            <th scope="col" class="px-6 py-4">Descrição</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($route->expenses as $expense)
                            <tr class="dark:bg-blue-50 hover:bg-blue-300 dark:hover:bg-blue-300 text-gray-600 hover:text-blue-50 transition-colors font-medium">
                              <th scope="row" class="px-6 py-4 whitespace-nowrap">{{ $expense->expense->name }}</th>
                              <td class="px-6 py-4 whitespace-nowrap">{{ $expense->value != '' ? 'R$ '.number_format($expense->value,2,',','.') : '' }}{{ $expense->expense->id == 1 ? ' ('.$expense->quantity.' L)' : '' }}</td>
                              <td class="px-6 py-4 whitespace-nowrap">{{ $expense->description }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </td>
                @endif                
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <x-modals.route-expenses></x-modals.route-expenses>

</x-layout>