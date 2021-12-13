import { createStore } from 'vuex'
import { auth, board, task } from './modules'

const store = createStore({
  modules: {
    auth,
    board,
    task,
  },
})

export default store
