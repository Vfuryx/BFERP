
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './App.vue';

import ElementUi from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUi);

import 'normalize.css/normalize.css';

import './styles/index.scss' // global css

import router from './router/index.js';

import Vuex from 'vuex';
Vue.use(Vuex);

import store from './store/index.js';

Vue.config.productionTip = false;

import './icons/index.js' // icon
import './permission.js' // permission control

const app = new Vue({
    el: '#app',
    router,
    store,
    render:h=>h(App)
});
