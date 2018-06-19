import axios from 'axios'

let baseUrl = 'http://bferp.test/api';
/*
if (process.env.NODE_ENV === 'development') {
  baseUrl = 'http://...'
} else if (process.env.NODE_ENV === 'production') {
  baseUrl = 'http://...'
}
http.defaults.baseURL = baseUrl;


// http.defaults.timeout = 2500
http.defaults.headers.post['Content-Type'] = 'application/json'
// cache-control: "max-age=0, private, must-revalidate"
// http.defaults.headers.post['Cache-control'] = 'max-age=5'

// Add a request interceptor 解决ie下url带中文参数乱码问题
http.interceptors.request.use(function (config) {
  // Do something before request is sent
  if(config.method == 'get'){
    config.url  = encodeURI(config.url);
  }
  return config;
}, function (error) {
  // Do something with request error
  return Promise.reject(error);
});

// Add a response interceptor
http.interceptors.response.use(function (response) {
  // Do something with response data
  return response;
}, function (error) {
  // Do something with response error
  if(error.response){
    if(error.response.status === 400 ){
      window.app.$message.error('数据错误！');
    }
    else if(error.response.status === 401 ){
      // define window.app=vm in main.js
      window.app.$router.push({name: 'Login'});
    }
    else if(error.response.status === 403 ){
      window.app.$message.error('您没有操作权限哦！');
    }
    else if(error.response.status === 404 ){
      window.app.$message.error('对象不存在！');
    }
    else if(error.response.status === 500 ){
      window.app.$message.error('服务器发生了一些错误哦！');
    }
  }
  return Promise.reject(error);
});

// 创建axios实例
const service = axios.create({
  // headers: {'content-type': 'application/x-www-form-urlencoded'},
  baseURL: 'https://easy-mock.com/mock/5950a2419adc231f356a6636/vue-admin', // api的base_url
  timeout: 15000 // 请求超时时间
})

//有的请求需要用户认证，视情况而定
const getConfig = function (auth) {
  let config = {}
  if(auth){
    config.headers={
      "Authorization": auth
    }
  }
  return config;
}
*/

var http = {
  get:function (url,data={},success,fail) {
    return axios.get(baseUrl+url)
      .then(function (res) {
        success(res);
      })
      .catch(function (error) {
        if(fail){
          fail(error);
        }
        console.log(error);
      })
  },

  post:function (url,data={},success,fail) {
    return axios.post(url,data)
      .then(function (res) {
        success(res);
      })
      .catch(function (error) {
        if(fail){
          fail(error);
        }
        console.log(error);
      })
  },

  put:function (url,data={},success,fail) {
    return axios.put(baseUrl+url,data)
      .then(function (res) {
        success(res);
      })
      .catch(function (error) {
        if(fail){
          fail(error);
        }
        console.log(error);
      })
  },

  delete:function(url,data={},success,fail){
    return axios.delete(baseUrl+url,data)
      .then(function(res){
      success(res);
    })
      .catch(function(error){
        if(fail){
          fail(error)
        }
        console.log(error);
      })
  },

  patch: function(url,data={},success,fail){
    return axios.patch(baseUrl+url,data)
      .then(function(res){
        success(res);
      })
      .catch(function(error){
        if(fail){
          fail(error)
        }
        console.log(error);
      })
  }
};

export default http