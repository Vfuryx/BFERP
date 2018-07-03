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
import egrid from 'egrid'

import store from './store/index.js'

import i18n from './lang/index.js'

import './icons/index.js'

import './iconfont/iconfont.css'

import qs from 'qs'
Vue.prototype.$qs = qs

Vue.use(Vuex,egrid)
Vue.use(ElementUi, {
    size: 'medium',
    i18n: (key, value) => i18n.t(key, value)
})

import {post,fetch,patch,put,del} from './utils/http.js'



router.beforeEach((to, from, next) => {
  if (to.meta.requireAuth) {
    if (store.state.user.token) {
      next();
    }
    else {
      next({
        path: '/login',
        query: {redirect: to.fullPath}
      })
    }
  }
  else {
    next();
  }
});

//定义全局变量
Vue.prototype.$post=post
Vue.prototype.$fetch=fetch
Vue.prototype.$patch=patch
Vue.prototype.$put=put
Vue.prototype.$del=del

//组件messageBox
import MessageBox from './api/messageBox.js'
Vue.use(MessageBox);

//组件delMask
import DelMask from './components/delMask.vue'
Vue.component('DelMask',DelMask);

//组件messageBox
import MsgBox from './components/MessageBox.vue'
Vue.component('MessageBox',MsgBox);

//组件table
import MyTable from './components/myTable.vue'
Vue.component('MyTable',MyTable);

//组件addMask
import AddMask from './components/addMask.vue'
Vue.component('AddMask',AddMask);

//组件addMask
import Pagination from './components/pagination.vue'
Vue.component('Pagination',Pagination);

const app = new Vue({
    el: '#app',
    router,
    store,
    i18n,
    render:h=>h(App)
});

