import { BoardResource } from '@/api/boardResource'
import { TaskResource } from '@/api/taskResource'

const state = {
  boards: [],
  activeBoard: null,
  taskList: [],
}

const getters = {
  boards: (state) => state.boards,
  activeBoard: (state) => state.activeBoard,
  taskList: (state) => state.taskList,
}

const mutations = {
  SET_BOARDS: (state, data) => {
    state.boards = data
  },
  SET_ACTIVE_BOARD: (state, data) => {
    state.activeBoard = data
  },
  SET_TASK_LIST: (state, data) => {
    state.taskList = data
  },
}

const actions = {
  async getBoards({ commit }) {
    const { data } = await BoardResource.getAll({ scope: 'me' })
    commit('SET_BOARDS', data.rows)
    return data.rows
  },
  async getBoardTaskList({ commit }, boardId) {
    const { data } = await BoardResource.getById(boardId, { include: 'taskList' })
    const taskList = data.task_list
    delete data.task_list
    commit('SET_ACTIVE_BOARD', data)
    commit('SET_TASK_LIST', taskList)
  },
  async getTaskListItems({ state }, taskListId) {
    const { data } = await TaskResource.getAll({
      'filter[task_list_id]': taskListId,
    })

    return data
  },
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
}
