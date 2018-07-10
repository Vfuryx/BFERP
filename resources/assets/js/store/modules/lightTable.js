import {Message} from 'element-ui'
import axios from 'axios'
import qs from 'qs'

const LightTable ={
  state:{
    newArr:[],
    delArr:[]
  },
  mutations:{
    SET_ARR: (state,arr) => {
      state.newArr = arr;
    },
    SET_DELARR: (state,del) => {
      state.delArr = del;
    },
  },
  actions:{
    setArr({commit},arr) {
      commit('SET_ARR',arr);
    },
    setDelArr({commit},del) {
      commit('SET_DELARR',del);
    },
  }
}

export default LightTable;