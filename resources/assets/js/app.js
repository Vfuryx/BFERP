
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
// Vue.use(ElementUi);

import 'normalize.css/normalize.css';

import './styles/index.scss' // global css

import router from './router/index.js';

import Vuex from 'vuex';
// import { mapState } from 'vuex';
Vue.use(Vuex);

import store from './store/index.js';

import i18n from './lang/index.js';

Vue.config.productionTip = false;

import './icons/index.js' // icon
import './permission.js' // permission control

import './iconfont/iconfont.css' //引入iconfont字体
import * as filters from './filters/index.js' // global filters


Vue.use(ElementUi, {
    size: 'medium', // set element-ui default size
    i18n: (key, value) => i18n.t(key, value)
})

// register global utility filters.
Object.keys(filters).forEach(key => {
    Vue.filter(key, filters[key])
})

const app = new Vue({
    el: '#app',
    router,
    store,
    i18n,
    render:h=>h(App)
});
