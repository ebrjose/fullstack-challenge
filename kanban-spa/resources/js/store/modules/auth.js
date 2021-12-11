import { login, logout } from '@/api/auth'
import { isLogged, setLogged, removeToken } from '@/utils/auth'

const state = {
  user: null,
  isLogged: isLogged(),
}

const getters = {
  isLogged: (state) => state.isLogged,
}

const mutations = {
  SET_USER: (state, user) => {
    state.user = user
  },
}

const actions = {
  login({ commit }, credentials) {
    const { email, password } = credentials
    return new Promise((resolve, reject) => {
      login({ email: email.trim(), password: password })
        .then(({ data }) => {
          setLogged('1')
          commit('SET_USER', data.user)
          resolve(data)
        })
        .catch((error) => {
          console.log(error)
          reject(error)
        })
    })
  },

  logout({ commit }) {
    return new Promise((resolve, reject) => {
      logout()
        .then(() => {
          removeToken()
          resolve()
        })
        .catch((error) => {
          reject(error)
        })
    })
  },
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
}
