require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)
const opts = {}
export default new Vuetify(opts)

import Dashboard from './pages/Dashboard.vue';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('app', require('./components/App.vue').default);

const routes = [
    {
        path: '/',
        name: 'Dashboard',
        component: Dashboard
    }
];

const router = new VueRouter({
    routes 
  })

const app = new Vue({
    el: '#app',
    router:router,
    vuetify: new Vuetify()
});
