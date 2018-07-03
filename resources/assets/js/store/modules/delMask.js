import {Icon, Message} from 'element-ui';
import axios from 'axios'
import qs from 'qs'

const delMask = {
  state: {
    delShow: false,
    delArr:[],
    url:''
  },
  mutations: {
    SET_SHOW: (state, val) => {
      state.delShow = val;
    },
    CANCEL_DEL: (state) => {
      state.delShow = false;
    },
    SET_URL: (state, url) => {
      state.url = url;
    },
    SET_DELARR: (state, delArr) => {
      state.delArr = delArr;
    },
  },
  actions: {
    setShow({commit}, val) {
      commit('SET_SHOW', val)
    },
    cancelD({commit}) {
      commit('CANCEL_DEL');
      Message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD({commit},{url,id}){
      return new Promise((resolve,reject)=>{
        axios.delete(url + id)
          .then(() => {
            Message({
              message: '删除成功',
              type: 'success'
            });
            commit('CANCEL_DEL');
            resolve();
          })
          .catch(err => {
            commit('CANCEL_DEL');
            if (err.response.status == 404) {
              Message.error({
                message: '没有查询到相关数据'
              });
            }
            reject(err)
          })
      });
    },
    setUrl({commit}, url) {
      commit('SET_URL', url)
    },
    setDelArr({commit}, delArr) {
      commit('SET_DELARR', delArr)
    },
    //批量删除
    delMore({state}) {
      return new Promise((resolve, reject) => {
      if (state.delArr.length === 0) {
        Message({
          message: '没有选中数据',
          type: 'warning'
        });
      } else {
        Vue.prototype.$msgBox.showMsgBox({
          title: '提示',
          content: '此操作将永久删除该数据, 是否继续?'
        }).then(async () => {
          axios.delete(state.url, {data: qs.stringify({ids: state.delArr})})
            .then(() => {
              Message({
                message: '删除成功',
                type: 'success'
              });
              resolve();
            })
            .catch(err => {
              Message.error({
                message: '删除失败'
              });
              reject(err);
            })
        }).catch(() => {
          Message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
      })
    }
  },
};
export default delMask