import { login, logout, fetchUser, register } from '@/api/authResource'
import * as auth from '@/utils/auth'

const state = {
  user: auth.getUser(),
  isLogged: auth.isLogged(),
}

const getters = {
  isLogged: (state) => state.isLogged,
  user: (state) => state.user,
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
          auth.setLogged()
          auth.setUser(data.user)
          commit('SET_USER', data.user)
          resolve(data)
        })
        .catch((error) => {
          reject(error)
        })
    })
  },
  logout({ commit }) {
    return new Promise((resolve, reject) => {
      logout()
        .then(() => {
          auth.destroy()
          commit('SET_USER', null)
          resolve()
        })
        .catch((error) => {
          reject(error)
        })
    })
  },
  getUser({ commit }) {
    return new Promise((resolve, reject) => {
      if (auth.getUser()) {
        resolve(auth.getUser())
      }

      fetchUser()
        .then(({ data }) => {
          commit('SET_USER', data.user)
          resolve(data.user)
        })
        .catch((error) => {
          reject(error)
        })
    })
  },
  register({ commit }, form) {
    return new Promise((resolve, reject) => {
      register(form)
        .then(({ data }) => {
          auth.setLogged()
          auth.setUser(data.user)
          commit('SET_USER', data.user)
          resolve(data)
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
