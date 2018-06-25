import { login, getInfo, logout } from '../../api/login.js';
import { getToken, setToken, removeToken } from '../../utils/auth.js';
import axios from 'axios'
import router from '../../router/index.js'

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
    LOGOUT: (state)=>{
      state.token = null;
    }
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

 /*   // 获取用户信息
    GetInfo({ commit, state }) {
      return new Promise((resolve, reject) => {
        getInfo().then(res => {
          const data = res.data
          if (data.roles && data.roles.length > 0) { // 验证返回的roles是否是一个非空数组
            commit('SET_ROLES', data.roles)
          } else {
            reject('getInfo: roles must be a non-null array !')
          }
          commit('SET_NAME', data.name)
          commit('SET_AVATAR', data.avatar)
          resolve(response)
        }).catch(error => {
          reject(error)
        })
      })
    },*/
    //登录成功后使用token拉取用户信息
   /* Profile({ commit }){
      return new Promise((resolve,reject)=>{
        getInfo().then(res=>{
          if(res.status == 200){
            commit('PROFILE',res.data)
            resolve()
          }else{
            reject()
          }
        })
      })
    },*/

    // 退出
    Logout({ commit }) {
      return new Promise((resolve, reject) => {
        logout().then(() => {
          removeToken();
          router.push({
            path: '/login'
          });
          commit('LOGOUT');
          resolve()
        }).catch((err) => {
          reject(err)
        })
      })
    },

    // 前端 登出
   /* FedLogOut({ commit }) {
      return new Promise(resolve => {
        commit('SET_TOKEN', '')
        removeToken()
        resolve()
      })
    },*/

  //  删除cookie
    DelToken(){
      return new Promise(()=>{
        removeToken()
      })
    },

  //  将刷新的token保存到本地
    refreshToken({commit},token){
      return new Promise(()=>{
        commit('REFRESH_TOKEN',token)
      })
    }
  }
}

export default user
