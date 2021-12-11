import '@/bootstrap'

const request = window.axios.create({
  baseURL: '/api',
  timeout: 1000,
})

export default request
