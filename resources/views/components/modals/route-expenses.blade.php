<div id="modal-expenses" class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center">
  <div class="relative w-auto my-6 mx-auto max-w-[90%] lg:max-w-4xl">
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <div class="modal-header flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
        <h3 class="modal-title text-2xl font-semibold text-blue-400">Despesas</h3><br>
        <h4 class="modal-subtitle"></h4>
        <button onclick="toggleModal('modal-expenses')" class="ml-auto bg-transparent border-0 float-right leading-none font-semibold outline-none focus:outline-none">
          <span class="bg-transparent text-gray-500 h-6 w-6 text-2xl block outline-none focus:outline-none">×</span>
        </button>
      </div>
      <div class="modal-body relative p-6 flex-auto"></div>
      <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
        <button class="bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-expenses')">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>
<x-modals.background></x-modals.background>