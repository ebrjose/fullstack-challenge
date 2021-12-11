import { createApp } from 'vue'
// import store from './store'
import { router } from './router'

import App from './App.vue'
import DefaultLayout from './layouts/DefaultLayout'
import EmptyLayout from './layouts/EmptyLayout'

createApp(App)
  .component('default-layout', DefaultLayout)
  .component('empty-layout', EmptyLayout)
  .use(router)
  // .use(store)
  .mount('#app')
