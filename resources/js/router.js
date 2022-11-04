require('./bootstrap')
import Router from 'vue-router'
import Vue from 'vue'

Vue.use(Router)

const routes = [
    {
        name: 'Dashboard',
        path: '/',
        component: () => import(/* webpackChunkName: "chunks/countries" */ './view/Dashboard'),
    },
    {
        name: 'CreateNewCountry',
        path: '/create-new-country',
        component: () => import(/* webpackChunkName: "chunks/createNewCountry" */ './view/CreateNewCountry'),
    },
    {
        name: 'CountryDetail',
        path: '/country/:id?',
        component: () => import(/* webpackChunkName: "chunks/countryDetail" */ './view/CountryDetail'),
    }
]

const router = new Router({
    mode: 'history',
    routes
})

export default router
