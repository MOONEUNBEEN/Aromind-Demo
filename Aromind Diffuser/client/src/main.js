// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
require('../node_modules/bootstrap/dist/css/bootstrap.css')
require('../node_modules/bootstrap-vue/dist/bootstrap-vue.css')
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios'
import VeeValidate from 'vee-validate'
import Auth from './packages/auth/Auth.js'
import cors from 'cors'

Vue.config.productionTip = false
const base = axios.create({
  baseURL: 'http://localhost:8000'
})
Vue.prototype.$http = base;
Vue.use(BootstrapVue)
Vue.use(VeeValidate)
Vue.use(Auth)
Vue.use(cors)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
