import request from '@/libs/axios'

export function login(data) {
  return request({
    url: '/auth/login',
    method: 'post',
    data: data,
  })
}

export function fetchUser() {
  return request({
    url: '/auth/user',
    method: 'get',
  })
}

export function register(data) {
  return request({
    url: '/auth/register',
    method: 'post',
    data: data,
  })
}

export function logout() {
  return request({
    url: '/auth/logout',
    method: 'post',
  })
}

export function csrf() {
  return request({
    url: '/sanctum/csrf-cookie',
    method: 'get',
  })
}
