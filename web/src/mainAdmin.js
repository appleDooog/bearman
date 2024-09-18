import { createApp } from 'vue'
import App from './Admin.vue'
import './registerServiceWorker'
import router from './router/adminIndex'
import store from './store'

createApp(App).use(store).use(router).mount('#app')
