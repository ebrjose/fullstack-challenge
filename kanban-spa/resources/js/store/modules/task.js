import { TaskResource } from '@/api/taskResource'

const state = {}
const getters = {}
const mutations = {}

const actions = {
  async saveTask({ state }, task) {
    const { data } = await TaskResource.store(task)
    return data
  },
  async updateTask({ state }, { taskId, resource }) {
    const { data } = await TaskResource.update(taskId, resource)
    return data
  },
  async updateTasksIndexes({ state }, resource) {
    const { data } = await TaskResource.updateIndexes(resource)
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
