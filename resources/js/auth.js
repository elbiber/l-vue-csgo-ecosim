import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        status: '',
        token: null,
        user: null
    },
    mutations: {

    },
    actions: {
        register() {

        },
        async login(_, credentials) {
            let response = axios.post('/api/login', this.loginData)
            console.log(response)
        },
        logout() {
            
        }
    },
    getters: {
        
    }
})
