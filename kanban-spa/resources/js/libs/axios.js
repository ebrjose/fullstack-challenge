import '@/bootstrap'

const request = window.axios.create({
  baseURL: process.env.MIX_BASE_API,
  timeout: 1000,
})

export default request
