import './assets/main.css'
import { createApp } from "vue";
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@fortawesome/fontawesome-svg-core'
import '@fortawesome/vue-fontawesome'
import 'bootstrap'

import { defineRule } from 'vee-validate'
import AllRules from '@vee-validate/rules';

Object.keys(AllRules).forEach(rule => {
  defineRule(rule, AllRules[rule]);
});


const app = createApp(App)
app.use(router,store)
app.config.globalProperties.$store=store
app.mount('#app');

