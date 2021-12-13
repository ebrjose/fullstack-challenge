<template>
  <div class="rounded bg-gray-200 flex-no-shrink w-80 p-2 mr-3">
    <div class="flex justify-between items-center py-1">
      <h3 class="text-xl">{{ title }}</h3>
      <div class="text-sm text-gray-600">
        Tasks: <span class="text-purple-700 font-bold">{{ taskCount }}</span>
      </div>
    </div>
    <div class="text-sm mt-2">
      <task-list ref="taskList" :task-list-id="id" :is-done="isDone" />
      <new-task :task-list-id="id" />
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
  props: ['id', 'title', 'isDone'],
  data() {
    return {
      isMounted: false,
    }
  },
  mounted() {
    this.isMounted = true
  },
  computed: {
    taskCount() {
      if (!this.isMounted) return
      return this.$refs.taskList.items.length
    },
  },
}
</script>
