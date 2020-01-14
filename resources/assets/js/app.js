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

//
import MessageBox from './api/messageBox.js'
Vue.use(MessageBox);

//单条删除
import DelMask from './components/delMask.vue'
Vue.component('DelMask',DelMask);

//批量删除
import MsgBox from './components/MessageBox.vue'
Vue.component('MessageBox',MsgBox);

/*
* table组件
* 不完整版，未整合添加面板
* 待整合删除*/
import MyTable from './components/myTable.vue'
Vue.component('MyTable',MyTable);

/*可以区分tabs卡的table完整组件*/
import VTabs from './components/vTabs.vue'
Vue.component('VTabs',VTabs);

//完全调用的添加面板
import AddMask from './components/addMask.vue'
Vue.component('AddMask',AddMask);

//分页
import Pagination from './components/pagination.vue'
Vue.component('Pagination',Pagination);

//完全调用的添加面板
import LightTable from './components/lightTable.vue'
Vue.component('LightTable',LightTable);

/*
* 从VTabs分裂出的table组件
* 待整合删除
* */
import VTable from './components/vTable.vue'
Vue.component('VTable',VTable);

//组件可自定义添加事件的添加面板
import AddNew from './components/addNew.vue'
Vue.component('AddNew',AddNew);

const app = new Vue({
    el: '#app',
    router,
    store,
    i18n,
    render:h=>h(App)
});

