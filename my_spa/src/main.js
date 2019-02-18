import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios'
import VueAxios from 'vue-axios'
// import $ from 'jquery'

import 'we-vue/lib/style.css'
import "@/assets/css/base.css"
import "@/assets/css/style.css"
import "@/assets/js/jquery-3.3.1.min.js"
import "@/assets/js/flexible.min.js"
Vue.use(VueAxios, axios)
axios.defaults.baseURL = 'http://127.0.0.1:8000/api'
import { DatetimePicker } from 'we-vue'
Vue.component(DatetimePicker.name, DatetimePicker)
Vue.config.productionTip = false

// http request 拦截器
axios.interceptors.request.use(
  config => {
    let token = localStorage.getItem('token');
    if (token) {
      config.headers['Authorization'] = `Bearer ${token}`;
    }
    return config;
  },
  err => {
    return Promise.reject(err);
  });


// 导航守卫
router.beforeEach((to,from,next)=>{
  if(to.meta.needLogin){
    let token = localStorage.getItem("token")
    if(token){
      next()
    }else{
      next("/logon")
    }
  }else{
    next()
  }
})

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
