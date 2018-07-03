import {login, getInfo, logout} from '../../api/login.js';
import {getToken, setToken, removeToken, getUser, setUser, removeUser} from '../../utils/auth.js';
import axios from 'axios'
import router from '../../router/index.js'

const user = {
  state: {
    token: getToken(),
    name: getUser()
  },

  mutations: {
    SET_TOKEN: (state, token) => {
      state.token = token
    },
    DEL_TOKEN: (state) => {
      state.token = null;
      state.name = null;
    },
    REFRESH_TOKEN: (state, token) => {
      setToken(state.token);
      state.token = token.substring(token.indexOf(' ') + 1);
      axios.defaults.headers.common['Authorization'] = state.token;
    },
    PROFILE: (state, data) => {
      state.name = data.username;
    },
    LOGOUT: (state) => {
      state.token = null;
      state.name = null;
    }
  },

  actions: {
    // 登录
    Login({commit}, data) {
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

    //登录成功后拉取用户信息
    Profile({commit}) {
      return new Promise((resolve, reject) => {
        getInfo().then(res => {
          if (res.status == 200) {
            setUser(res.data.username)
            commit('PROFILE', res.data)
            resolve()
          } else {
            reject()
          }
        })
      })
    },

    // 退出
    Logout({commit}) {
      return new Promise((resolve, reject) => {
        logout().then(() => {
          removeToken();
          removeUser();
          commit('LOGOUT');
          router.push({
            path: "/login",
            query: {redirect: router.currentRoute.fullPath}
          })
          resolve()
        }).catch((err) => {
          reject(err)
        })
      })
    },

    //  删除cookie
    DelToken({commit}) {
      return new Promise(resolve => {
        commit('DEL_TOKEN');
        removeToken();
        removeUser();
        resolve()
      })
    },

    //  将刷新的token保存到本地
    refreshToken({commit}, token) {
      return new Promise(resolve => {
        commit('REFRESH_TOKEN', token);
        resolve()
      })
    }
  }
}

export default user
