import VueRouter from 'vue-router'
import Simulator from './components/Simulator'
import Items from './components/items/Items'
import Create from './components/items/Create.vue'
import Item from './components/item/Item'
import Dashboard from './components/Dashboard'
import SignIn from './components/SignIn'
import SignUp from './components/SignUp'

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard
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
        path: '/signin',
        name: 'signin',
        component: SignIn
    },
    {
        path: '/signup',
        name: 'signup',
        component: SignUp
    }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
