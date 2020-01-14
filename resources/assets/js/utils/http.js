import axios from 'axios'
import router from '../router/index.js'
import store from '../store/index.js'
import {Message} from 'element-ui'
import { setToken,removeToken } from '../utils/auth.js';

axios.defaults.timeout = 5000;
axios.defaults.baseURL ='http://bferp.test/api';
axios.defaults.headers['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';

// http request 拦截器
axios.interceptors.request.use(
  config => {
    if(store.getters.token){
      config.headers.Authorization =`Bearer ${store.getters.token}`;
    }
    // console.log('config',config);
    return config
  },
  error => {
    if(error.response){
      Message({
        message: "加载超时",
        type: 'error'
      });
      return Promise.reject(error)
    }
  }
);

/* http response 拦截器 */
axios.interceptors.response.use(
  response => {
    let token;
    if(response.headers.authorization){
      token = response.headers.authorization;
    }
    if(token){
      // store.dispatch('refreshToken',token)
      this.$store.dispatch('refreshToken',token)
    }
    return response
  },
  error => {
   /* if (error.response) {
      //只要报错就清空token
      switch (error.response.data.status_code) {
        case 401:
          console.log(error.response);
          // removeToken();
          //可以监控到所有的401错误
          // console.log(error.response);
          //清空cookie和token
          store.dispatch('DelToken');
          Message.error({
            message: '身份验证已过期，请重新登录'
          });
          router.replace({
            path: '/login',
            query: {redirect: router.currentRoute.fullPath}
          });
      }
      // store.dispatch('DelToken');
    }else{
      return Promise.reject(error)
    }*/
    // console.log(error.response);
    if(error.response){
      if(error.response.data.message == "The token has been blacklisted"){
        // store.dispatch('DelToken');
        this.$store.dispatch('DelToken');
        /*router.replace({
          path: '/login',
          query: {redirect: router.currentRoute.fullPath}
        });*/
        router.replace("/login");
        Message.error('身份验证已过期，请重新登录');
        return
      }else{
        return Promise.reject(error)
      }
    }
  });

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
    // axios.put(url,{data: this.$qs.stringify(data)})
    axios.put(url,this.$qs.stringify(data))
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



