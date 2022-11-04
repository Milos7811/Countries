require('./bootstrap')
import Vue from 'vue'
import Router  from 'vue-router'
import router from './router'
import App from './App.vue'
import Pagination from 'vue-pagination-2'

Vue.use(Router)
Vue.use(Pagination)

let countries = new Vue({
    router,
    render: (h) => h(App),
}).$mount('#app')
