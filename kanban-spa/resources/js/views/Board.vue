<template>
  <div class="container mx-auto px-10">
    <div class="py-3 pb-5">
      <h1 class="font-thin text-2xl">
        <router-link to="/"> <span class="text-gray-300">My Boards</span> </router-link>
        <span class="text-cyan-300">
          <i class="bi bi-chevron-compact-right"></i>
        </span>
        <span class="text-white">{{ activeBoard?.title }}</span>
      </h1>
    </div>

    <div class="flex items-start overflow-x-auto">
      <task-column v-for="item in taskList" :key="item.id" :id="item.id" :title="item.title" :is-done="item.is_done" />
    </div>
  </div>
</template>
<script>
import Column from '@/components/board/Column.vue'
import { mapGetters, mapActions } from 'vuex'

export default {
  components: {
    TaskColumn: Column,
  },
  created() {
    this.getBoardTaskList(this.$route.params.id)
  },
  computed: {
    ...mapGetters('board', ['activeBoard', 'taskList']),
  },
  methods: {
    ...mapActions('board', ['getBoardTaskList']),
  },
}
</script>
