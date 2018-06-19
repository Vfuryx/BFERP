require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue'
import vueResource from 'vue-resource'
Vue.use(vueResource)

import ElementUi from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

import 'normalize.css/normalize.css'

import './styles/app.scss'

import router from './router/index.js'

import Vuex from 'vuex'
Vue.use(Vuex)

import store from './store/index.js'

import i18n from './lang/index.js'

import './icons/index.js'

import './iconfont/iconfont.css'

Vue.use(ElementUi, {
    size: 'medium',
    i18n: (key, value) => i18n.t(key, value)
})

import axios from 'axios'
import request from './utils/http.js'

Vue.prototype.$request = request;

/*//定义全局变量
Vue.prototype.$post=http.post;
Vue.prototype.$get=http.get;
Vue.prototype.$patch=http.patch;
Vue.prototype.$put=http.put;
Vue.prototype.$del=http.delete;*/

const app = new Vue({
    el: '#app',
    router,
    store,
    i18n,
    render:h=>h(App)
});

/*
// Vue.config.productionTip = false;
// import './permission.js' // permission control
// import * as filters from './filters/index.js' // global filters
// register global utility filters.
/*Object.keys(filters).forEach(key => {
    Vue.filter(key, filters[key])
})
*/

