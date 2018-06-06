import Vue from 'vue'
import Vuex from 'vuex'
import app from './modules/app_store.js'
import user from './modules/user.js'
import getters from './getters.js'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    app,
    user
  },
  getters
})

export default store
