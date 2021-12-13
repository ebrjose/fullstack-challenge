<template>
  <draggable :list="items" item-key="name" ghost-class="bg-cyan-100" @change="log" group="tasks" class="draggable-task-items">
    <template #item="{ element }">
      <task-item :task="element" />
    </template>
  </draggable>
</template>
<script>
import draggable from 'vuedraggable'
import TaskItem from './TaskItem.vue'

import { mapMutations, mapActions } from 'vuex'

export default {
  components: {
    draggable,
    TaskItem,
  },
  props: ['taskListId', 'isDone'],
  data() {
    return {
      items: [],
      indexes: [],
    }
  },
  mounted() {
    this.getListItems()
    this.onAddTaskEvent()
  },
  methods: {
    ...mapActions('board', ['getTaskListItems']),
    ...mapActions('task', ['updateTasksIndexes']),
    ...mapMutations('board', ['ADD_TASK_LIST_ITEM']),
    async getListItems() {
      const { rows } = await this.getTaskListItems(this.taskListId)
      this.items = rows
    },
    onAddTaskEvent() {
      this.emitter.on('add-item-task-list', (data) => {
        if (data.taskListId === this.taskListId) {
          this.items.push(data.task)
          this.updateIndexes()
        }
      })
    },
    async updateIndexes() {
      this.indexes = this.items.map((item, idx) => {
        return { id: item.id, index: idx, task_list_id: this.taskListId }
      })
      if (this.indexes.length) {
        await this.updateTasksIndexes({ indexes: this.indexes })
      }
    },
    log(event) {
      this.updateIndexes()

      if (event.added && this.isDone) {
        this.emitter.emit('show-modal', true)
      }
    },
  },
}
</script>

<style>
.draggable-task-items {
  min-height: 0.5rem;
}
</style>
