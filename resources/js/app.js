
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

//input form handle by vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Message handle by sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000
})
window.Toast = Toast;

//vue js router handle
const router = new VueRouter({
  routes, // short for `routes: routes`
  mode: 'history'
})

//vue js action
const app = new Vue({
    el: '#app',
    router
});
