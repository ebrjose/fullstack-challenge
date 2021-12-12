<template>
  <div class="container mx-auto px-10">
    <div class="py-3 pb-5">
      <h1 class="text-white font-bold text-2xl">My Boards > Board</h1>
    </div>
    <div class="flex items-start overflow-x-auto">
      <task-column />
      <task-column />
      <task-column />
    </div>
  </div>
</template>
<script>
import Column from '@/components/board/Column.vue'

export default {
  components: {
    TaskColumn: Column,
  },
}
</script>
