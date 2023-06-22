<x-layout pageTitle="Motoristas" pageLabel="Motoristas" navBarActive="drivers">  

  <x-slot:inputs>
    <x-inputs.input margin="mr-2" class="h-[32px] text-xs lg:text-sm" placeholder="Buscar motorista..." onkeyup="tableSearch('table-drivers',this.value)"></x-inputs.input>
  </x-slot:inputs> 

  <x-slot:btns>
    <x-links.blue label="Novo" href="{{ route('drivers.create') }}"></x-links.blue>
  </x-slot:btns>  
  
  <div class="relative overflow-x-auto shadow-md rounded">
    <table id="table-drivers" class="w-full text-sm text-left text-gray-400">
      <thead class="text-blue-700 uppercase bg-blue-100">
        <tr>
          <th scope="col" class="px-6 py-4">Nome</th>
          <th scope="col" class="px-6 py-4 text-right">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($drivers as $driver)
          <tr class="dark:bg-blue-50 hover:bg-blue-300 dark:hover:bg-blue-300 text-gray-600 hover:text-blue-50 transition-colors font-medium ">
            <td scope="row" class="px-6 py-4 whitespace-nowrap font-bold">{{ $driver->name }}</td>
            <td class="px-6 py-4 text-right whitespace-nowrap">
              <a href="{{ route('drivers.edit', $driver->id) }}" class="font-medium text-blue-400 hover:text-blue-50 transition-colors">Editar</a>
              <a href="{{ route('drivers.destroy', $driver->id) }}" class="font-medium text-blue-400 hover:text-blue-50 transition-colors ml-3" onclick="return confirm('Confirma a exclusão do motorista {{ $driver->name }}?');">Excluir</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</x-layout>