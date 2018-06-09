import Vue from 'vue'
import Vuex from 'vuex'
import app from './modules/app_store.js'
import tagsView from './modules/tagsView.js'
import user from './modules/user.js'
import getters from './getters.js'
import opt from './modules/opt.js'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    app,
    user,
    tagsView,
    opt
  },
  getters
})

export default store
