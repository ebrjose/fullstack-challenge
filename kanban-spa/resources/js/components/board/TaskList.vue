<template>
  <draggable :list="items" item-key="name" @change="log" group="tasks">
    <template #item="{ element }">
      <task-item :task="element" />
    </template>
  </draggable>
</template>
<script>
import draggable from 'vuedraggable'

import TaskItem from './TaskItem.vue'

export default {
  components: {
    draggable,
    TaskItem,
  },
  data() {
    return {
      items: [
        {
          name: 'Frontend',
          deadline: '10/12/2021',
        },
        {
          name: 'Backend',
          deadline: '12/12/2021',
        },
        {
          name: 'Devops',
          deadline: '14/12/2021',
        },
        {
          name: 'Design',
          deadline: '15/12/2021',
        },
      ],
    }
  },
  methods: {
    log(e) {
      console.log(e)
    },
  },
}
</script>
