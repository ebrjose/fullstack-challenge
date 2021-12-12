<template>
  <section class="container mx-auto px-10">
    <div class="py-3 pb-5">
      <h1 class="text-white font-bold text-2xl">My Boards</h1>
    </div>
    <section class="flex justify-between flex-wrap">
      <board-card v-for="board in boards" :key="board.id" :board="board" />
    </section>
  </section>
</template>
<script>
import BoardCard from '@/components/cards/BoardCard.vue'
import { BoardResource } from '@/api/boards'

export default {
  components: {
    BoardCard,
  },
  data() {
    return {
      boards: [],
      user_id: this.$store.user,
    }
  },
  mounted() {
    this.getBoards()
  },
  methods: {
    async getBoards() {
      const { data } = await BoardResource.getAll({ scope: 'me' })
      this.boards = data.rows
    },
  },
}
</script>
