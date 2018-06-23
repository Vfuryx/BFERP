import axios from 'axios'
// import router from '../router/index.js'
import store from '../store/index.js'

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
  err => {
    this.$message.error({
      message: '加载超时'
    });
    return Promise.reject(err)
  }
);

// http response 拦截器
axios.interceptors.response.use(
  response => {
    var token = response.headers.authorization;
    if(token){
      store.dispatch('refreshToken',token)
    }
    return response
  },
  error => {
    if(error.response){
      switch (error.response.status){
        case 401:
          return store.dispatch('Logout')
          break
        case 500:
          return store.dispatch('Logout')
          break
        case 400:
          // return this.$message.error(error.response.data.errors)
          return this.$message.error(error.response.data.message)
          break
      }
    }
    return Promise.reject(error);
  });

/*//http request 拦截器
axios.interceptors.request.use(
  config => {
    // const token = getCookie('名称');注意使用的时候需要引入cookie方法，推荐js-cookie
    config.data = JSON.stringify(config.data);
    config.headers = {
      'Content-Type':'application/x-www-form-urlencoded'
    }
    // if(token){
    //   config.params = {'token':token}
    // }
    return config;
  },
  error => {
    return Promise.reject(err);
  }
);

/!*axios.interceptors.request.use( (config) => {
  if (config.method=="post"){
    config.data = qs.stringify(config.data);
    config.headers['Content-Type'] = 'application/x-www-form-urlencoded';
  }
  return config;
},  (error) => {
  return Promise.reject(error);
});*!/

//http response 拦截器
axios.interceptors.response.use(
  response => {
    if(response.data.errCode ==2){
      router.push({
        path:"/login",
        querry:{redirect:router.currentRoute.fullPath}//从哪个页面跳转
      })
    }
    return response;
  },
  error => {
    return Promise.reject(error)
  }
)*/

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


