/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { ValidationProvider, ValidationObserver, extend } from 'vee-validate';
import { required, email, alpha } from 'vee-validate/dist/rules';

import adminComponents from './adminComponents'


let baseUrl = document.head.querySelector('meta[name="base-url"]');

window.baseUrl = baseUrl.content;

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);
extend('email', email);
extend('required', {
    ...required,
    message: 'This field is required'
});
extend('alpha', alpha);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: adminComponents
});
