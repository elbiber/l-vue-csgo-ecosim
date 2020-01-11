import VueRouter from 'vue-router'
import store from './store'

import Dashboard from './components/Dashboard'

import Login from './components/auth/Login.vue'
import Register from './components/auth/Register.vue'
import Profile from './components/Profile'

import Simulator from './components/Simulator'
import Items from './components/items/Items'
import Create from './components/items/Create.vue'
import Item from './components/item/Item'

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile
    },
    {
        path: '/simulator',
        name: 'simulator',
        component: Simulator
    },
    {
        path: '/items',
        name: 'items',
        component: Items
    },
    {
        path: '/items/create',
        name: 'create',
        component: Create
    },
    {
        path: '/item/:id',
        name: 'item',
        component: Item
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
router.beforeEach((to, from, next) => {
    //!!store.getters.isLoggedIn)
/*     if (!!store.getters.isLoggedIn) {
        next('/login')
    } */
    // else next()
    next()
})
export default router
