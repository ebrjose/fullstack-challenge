<template>
  <div class="w-full md:w-1/2 xl:w-1/3 pr-6 pb-6">
    <router-link :to="{ name: 'Board', params: { id: board.id } }">
      <div class="bg-gray-300 hover:bg-white border-l-4 border-purple-400 rounded-lg shadow-xl p-5 transition duration-500">
        <div class="flex flex-row items-center">
          <div class="flex-shrink pr-4">
            <div class="text-sky-700 text-4xl"><i class="bi bi-kanban"></i></div>
          </div>
          <div class="flex-1 text-left md:text-left">
            <h3 class="font-bold uppercase text-gray-600">{{ board.title }}</h3>
            <h6 class="text-left">
              <span class="text-green-500"></span>
            </h6>
          </div>
        </div>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ['board'],
}
</script>
