import Cookies from 'js-cookie'

const AUTHENTICATED = '1'
const TOKEN_KEY = 'isLogged'

export function isLogged() {
  return Cookies.get(TOKEN_KEY) === AUTHENTICATED
}

export function setLogged() {
  return Cookies.set(TOKEN_KEY, AUTHENTICATED)
}

export function removeToken() {
  return Cookies.remove(TOKEN_KEY)
}

export const getUser = () => JSON.parse(Cookies.get('user') || null)
export const setUser = (user) => Cookies.set('user', JSON.stringify(user))
export const removeUser = () => Cookies.remove('user')

export function destroy() {
  removeToken()
  removeUser()
}
