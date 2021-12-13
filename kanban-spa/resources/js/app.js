import { createApp } from 'vue'
import vClickOutside from 'click-outside-vue3'
import mitt from 'mitt'

import App from './App.vue'
import store from './store'
import DefaultLayout from './layouts/DefaultLayout'
import EmptyLayout from './layouts/EmptyLayout'
import { router } from './router'

const emitter = mitt()
const app = createApp(App)
app.config.globalProperties.emitter = emitter

app.component('default-layout', DefaultLayout)
app.component('empty-layout', EmptyLayout)

app.use(vClickOutside)
app.use(router)
app.use(store)

app.mount('#app')
