import { getLoggedinUser } from './auth'

const user = getLoggedinUser()

export default {
    namespaced:true,
    state: {
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
        reg_error:null,
        registeredUser: null
    },
    getters: {
        isLoading(state){
            return state.loading
        },
        isLoggedIn(state){
            return state.isLoggedIn
        },
        currentUser(state){
            return state.currentUser
        },
        currentUserIsAdmin(state) {
            if(state.currentUser) {
                return state.currentUser.is_admin == 1
            }
            return false
        },
        currentUserIsVerified(state) {
            if(state.currentUser) {
                return state.currentUser.email_verified_at
            }
            return false
        },
        authError(state){
            return state.auth_error
        },
        regError(state){
            return state.reg_error 
        },
        registeredUser(state){
            return state.registeredUser 
        }
    },
    mutations: {
        login(state){
            state.loading = true
            state.auth_error = null
        },
        loginSuccess(state, payload){
            state.auth_error = null
            state.isLoggedIn = true
            state.loading = false
            state.currentUser = Object.assign({}, payload.user, { token: payload.access_token })
            localStorage.setItem('user', JSON.stringify(state.currentUser))
        },
        loginFailed(state, payload){
            state.loading = false 
            state.auth_error = payload.error
        },
        logout(state){
            localStorage.removeItem('user')
            state.isLoggedIn = false
            state.currentUser = null
        },
        registerSuccess(state, payload){
            state.reg_error = null
            state.registeredUser = payload.user
        },
        registerFailed(state, payload){
            state.reg_error = payload.error
        }
    },
    actions: {
        login(context){
            context.commit('login')
        }
    }
}
