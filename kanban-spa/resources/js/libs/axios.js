import '@/bootstrap'
import { removeUser, destroy } from '@/utils/auth'
import { router } from '@/router'

const service = window.axios.create({
  baseURL: '/api',
  timeout: 5000,
})

service.interceptors.response.use(
  (response) => {
    return response
  },
  (error) => {
    if (error.response) {
      if (error.response.status === 401) {
        destroy()
        router.go(`/login?redirect=${router.currentRoute.value.fullPath}`)
      }
    }
  }
)

export default service
