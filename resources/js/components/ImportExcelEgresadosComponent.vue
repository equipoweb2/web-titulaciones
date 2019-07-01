<template>
  <div class="flex">
    <a @click="toggleModal" class="cursor-pointer bg-green-500 px-4 py-2 mr-2 rounded text-white hover:bg-green-600">
      Importar Excel <i class="fa fa-file-import ml-1"></i>
    </a>
    <div v-if="modal" @click.self="toggleModal" class="animated fadeIn fixed z-50 inset-0 overflow-auto bg-smoke-dark flex">
      <div class="animated fadeInUp fixed shadow-inner max-w-xl md:relative top-0 inset-x-0 align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col">
        <form method="POST" action="/alumnos/egresados/importar" accept-charset="UTF-8" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf" accept="application/wps-office.xls">
        <h2 class="text-4xl text-center font-hairline md:leading-loose text-soft-black md:mt-8 mb-4">Importar Excel de Egresados <i class="fa fa-file-excel ml-1"></i></h2>
        <div class="flex justify-center">
          <a href="/excel/plantilla_egresados.xlsx" class="bg-blue-500 mb-6 px-2 py-1 rounded text-white hover:bg-blue-700">Descargar plantilla Excel</a>
        </div>

        <div class="flex w-full justify-between items-center mb-2 mt-2">
            <input class="bg-gray-200 focus:bg-yellow-100 hover:bg-yellow-300 px-2 py-1 w-auto leading-tight appearance-none rounded border-b-2 border-yellow" name="excel" type="file">
            <button class="bg-green-500 px-4 py-2 rounded text-white hover:bg-green-600">
                Importar <i class="fa fa-file-import ml-1"></i>
            </button>
        </div>
        <span @click="toggleModal" class="absolute top-0 right-0 pt-4 px-4">
          <svg class="h-12 w-12 text-gray hover:text-gray-900" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: 'import-excel-egresados',
        data() {
            return {
                modal: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
        },
        methods: {
            toggleModal() {
                this.modal = !this.modal
            }
        }
    }
</script>
