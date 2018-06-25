import { login, getInfo, logout } from '../../api/login.js';
import { getToken, setToken, removeToken } from '../../utils/auth.js';
import axios from 'axios'
import router from "../../router";

const user = {
  state: {
    token: getToken(),
    name: ''
  },

  mutations: {
    SET_TOKEN: (state, token) => {
      state.token = token
    },
    REFRESH_TOKEN:(state,token)=>{
      state.token = token.substring(token.indexOf(' ')+1);
      axios.defaults.headers.common['Authorization'] = state.token;
      setToken(state.token);
    },
    PROFILE:(state,data)=>{
      state.name = data.name;
    },
    /*LOGOUT: (state)=>{
      state.token = null;
    }*/
  },

  actions: {
    // 登录
    Login({ commit },data) {
      return new Promise((resolve, reject) => {
        login(data).then(res => {
          let msg = res.data;
          setToken(msg.access_token);
          commit('SET_TOKEN', msg.access_token);
          resolve(res)
        }).catch((err) => {
          reject(err)
        })
      })
    },
    // 退出
    Logout({ commit }) {
      return new Promise((resolve, reject) => {
        logout().then(() => {
          removeToken();
          // commit('LOGOUT');
          router.replace({
            path: '/login',
            query: {redirect: router.currentRoute.fullPath}
          })
          resolve()
        }).catch((err) => {
          reject(err)
        })
      })
    },
  /*//  删除cookie
    DelToken({ commit }){
      return new Promise(()=>{
        removeToken();
        // commit('LOGOUT');
      })
    },*/
  //  将刷新的token保存到本地
    refreshToken({commit},token){
      return new Promise(()=>{
        commit('REFRESH_TOKEN',token)
      })
    }
  }
};

export default user
