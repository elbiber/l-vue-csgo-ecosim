require('./bootstrap')

import VueRouter from 'vue-router'
import Vuex from 'vuex'
import router from './routes'
import Index from './Index'
import Store from './store'

window.Vue = require('vue')

Vue.use(VueRouter)
Vue.use(Vuex)

const store = new Vuex.Store(Store)

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        'index': Index
    }
})