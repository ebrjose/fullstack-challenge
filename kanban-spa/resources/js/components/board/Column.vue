<template>
  <div class="rounded bg-gray-200 flex-no-shrink w-80 p-2 mr-3">
    <div class="flex justify-between py-1">
      <h3 class="text-xl">Buffer</h3>
    </div>
    <div class="text-sm mt-2">
      <task-list />
      <new-task />
    </div>
  </div>
</template>
<script>
import NewTask from './NewTask.vue'
import TaskList from './TaskList.vue'

export default {
  components: {
    NewTask,
    TaskList,
  },
}
</script>
