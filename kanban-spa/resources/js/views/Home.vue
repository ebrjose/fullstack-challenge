<template>
  <section class="container mx-auto px-10">
    <div class="py-3 pb-5">
      <h1 class="text-white font-thin text-2xl">My Boards</h1>
    </div>
    <section class="flex flex-wrap">
      <board-card v-for="board in boards" :key="board.id" :board="board" />
    </section>
  </section>
</template>
<script>
import BoardCard from '@/components/cards/BoardCard.vue'
import { mapGetters, mapActions } from 'vuex'

export default {
  components: {
    BoardCard,
  },
  created() {
    this.getBoards()
  },
  computed: {
    ...mapGetters('board', ['boards']),
  },
  methods: {
    ...mapActions('board', ['getBoards']),
  },
}
</script>
