import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from '@/views/Dashboard'

function lazyLoad(view) {
  return () => import(`@/views/${view}.vue`)
}

const routes = [
  {
    path: '/',
    name: 'Dashboard',
    component: Dashboard,
  },
  {
    path: '/login',
    name: 'Login',
    component: lazyLoad('Login'),
    meta: { layout: 'empty' },
  },
  {
    path: '/register',
    name: 'Register',
    component: lazyLoad('Register'),
    meta: { layout: 'empty' },
  },
  {
    path: '/board',
    name: 'Board',
    component: lazyLoad('Board'),
  },
  {
    path: '/:pathMatch(.*)',
    component: lazyLoad('404'),
    meta: { layout: 'empty' },
  },
]

const router = createRouter({
  history: createWebHistory(),
  scrollBehavior: () => ({ y: 0 }),
  routes,
})

export { router }
