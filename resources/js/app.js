
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)


import {routes} from './routers.js';

/*Vue.component('example-component', require('./components/ExampleComponent.vue').default);*/
/*Vue.component('admin-main', require('./components/admin/AdminMaster.vue'));*/
/*Vue.component('home', require('./components/admin/adminhome.vue').default);*/




const router = new VueRouter({
  routes, // short for `routes: routes`
  mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});
