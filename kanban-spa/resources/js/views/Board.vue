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

    <Modal :show="showModal" @close-modal="showModal = false">
      <template #header>
        <div class="text-center pt-5">
          <div class="text-4xl pb-2 text-green-600"><i class="bi bi-check-circle"></i></div>
          ¡Felicitaciones por lograrlo!
        </div>
      </template>
    </Modal>
  </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'

import Column from '@/components/board/Column.vue'
import Modal from '@/components/base/Modal.vue'

export default {
  components: {
    TaskColumn: Column,
    Modal,
  },
  data() {
    return {
      showModal: false,
    }
  },
  mounted() {
    this.modalHandler()
  },
  created() {
    this.getBoardTaskList(this.$route.params.id)
  },
  computed: {
    ...mapGetters('board', ['activeBoard', 'taskList']),
  },
  methods: {
    ...mapActions('board', ['getBoardTaskList']),
    modalHandler() {
      this.emitter.on('show-modal', (showModal) => {
        this.showModal = showModal
      })
    },
  },
}
</script>
