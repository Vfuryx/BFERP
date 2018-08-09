import Vue from 'vue'
import Vuex from 'vuex'
import app from './modules/app_store.js'
import tagsView from './modules/tagsView.js'
import user from './modules/user.js'
import getters from './getters.js'
import opt from './modules/opt.js'
import delMask from './modules/delMask.js'
import table from './modules/table.js'
import addMask from './modules/addMask.js'
import LightTable from './modules/lightTable.js'
import SonData from './modules/sonData.js'
import responseData from './modules/responseData.js'
import urls from './modules/urls.js'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    app,
    user,
    tagsView,
    opt,
    delMask,
    table,
    addMask,
    LightTable,
    SonData,
    responseData,
    urls
  },
  getters
});

export default store
