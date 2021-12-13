<template>
  <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">
    <div class="container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 px-10">
      <div class="w-1/2 pl-2 md:pl-0">
        <router-link :to="{ name: 'Home' }">
          <span class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold">
            <i class="bi bi-columns-gap text-indigo-600 pr-3"></i>
            TALENT BOARD
          </span>
        </router-link>
      </div>
      <div class="w-1/2 pr-2 md:pr-0">
        <div class="flex relative float-right" v-click-outside="hideMenu">
          <div class="relative text-sm">
            <button id="userButton" class="flex items-center focus:outline-none mr-3" @click="showMenu">
              <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User" />
              <span class="hidden md:inline-block mr-2">Hi, {{ user?.name }} </span>
              <i class="bi bi-caret-down-fill"></i>
            </button>
            <div v-show="isVisibleMenu" class="bg-white rounded shadow-md absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30">
              <ul class="list-reset">
                <li>
                  <div class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline" @click="handleLogout">Logout</div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      isVisibleMenu: false,
    }
  },
  async mounted() {
    // await this.getUser()
  },
  computed: {
    ...mapGetters('auth', ['user']),
  },
  methods: {
    ...mapActions('auth', ['logout']),
    showMenu() {
      this.isVisibleMenu = true
    },
    hideMenu() {
      this.isVisibleMenu = false
    },
    async handleLogout() {
      await this.logout()
      this.$router.replace('/login')
    },
  },
}
</script>
