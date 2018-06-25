import axios from 'axios'
import router from '../router/index.js'
import store from '../store/index.js'
import {removeToken} from "./auth.js";
import {Message} from 'element-ui'

axios.defaults.timeout = 5000;
axios.defaults.baseURL ='http://bferp.test/api';
axios.defaults.headers['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';

//用来处理刷新token后重新请求的自定义变量
axios.defaults.isRetryRequest = false

//刷新token的请求方法
/*function getRefreshToken() {
  let params = {
    grant_type: 'refresh_token',
    refresh_token: store.state.user.token
  };
  return axios.put('/authorizations/current', this.$qs.stringify(params));
}*/

// http request 拦截器
axios.interceptors.request.use(
  config => {
    if(store.getters.token){
      config.headers.Authorization =`Bearer ${store.getters.token}`;
    }
    return config
  },
  error => {
    if(error.response){
      this.$message.error({
        message: '加载超时'
      });
      return Promise.reject(error)
    }
  }
);

// http response 拦截器
axios.interceptors.response.use(
  response => {
    let token = response.headers.authorization;
    if(token){
      store.dispatch('refreshToken',token)
    }
    return response
  },
  error => {
    // return Promise.reject(err)
    if (error.response) {
      switch (error.response.status) {
        case 401:
          removeToken();
          router.replace({
            path: '/login',
            query: {redirect: router.currentRoute.fullPath}
          })
      }
    }
    return Promise.reject(error)   // 返回接口返回的错误信息
    // return Promise.reject(error.response.data)   // 返回接口返回的错误信息
  });

/*this.$message.error({
            message: '登录已过期，请重新登录'
          });*/
/*axios.interceptors.response.use(
  response => {
    return response;
  },
  error => {
    if (error.response) {
      switch (error.response.status) {
        case 401:
          // 返回 401 清除token信息并跳转到登录页面
          store.commit(types.LOGOUT);
          router.replace({
            path: 'login',
            query: {redirect: router.currentRoute.fullPath}
          })
      }
    }
    return Promise.reject(error.response.data)   // 返回接口返回的错误信息
  });*/
/**
 * 封装get方法
 * @param url
 * @param data
 * @returns {Promise}
 */

export function fetch(url,params = {}){
  return new Promise((resolve,reject) => {
    axios.get(url,{params: params})
      .then(response => {
        resolve(response.data);
      })
      .catch(err => {
        reject(err)
      })
  })
}

/**
 * 封装post请求
 * @param url
 * @param data
 * @returns {Promise}
 */

export function post(url,data ={}){
  return new Promise((resolve,reject) => {
    axios.post(url,this.$qs.stringify(data))
      .then(response => {
        resolve(response.data);
      },err => {
        reject(err)
      })
  })
}

/**
 * 封装patch请求
 * @param url
 * @param data
 * @returns {Promise}
 */

export function patch(url,data = {}){
  return new Promise((resolve,reject) => {
    axios.patch(url,this.$qs.stringify(data))
      .then(response => {
        resolve(response.data);
      },err => {
        reject(err)
      })
  })
}

/**
 * 封装put请求
 * @param url
 * @param data
 * @returns {Promise}
 */

export function put(url,data = {}){
  return new Promise((resolve,reject) => {
    axios.put(url,{data: this.$qs.stringify(data)})
      .then(response => {
        resolve(response.data);
      },err => {
        reject(err)
      })
  })
}

/**
 * 封装delete请求
 * @param url
 * @param data
 * @returns {Promise}
 */

export function del(url,data = {}){
  return new Promise((resolve,reject) => {
    axios.delete(url,{data: this.$qs.stringify(data)})
      .then(response => {
        resolve(response.data);
      },err => {
        reject(err)
      })
  })
}


