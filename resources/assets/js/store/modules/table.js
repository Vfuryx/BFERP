import {Message} from 'element-ui'
import axios from 'axios'
import qs from 'qs'
// import store from "../index";

const table = {
  state: {
    loading: true,
    changeData: {},
    inputChange: false,
    url: '',
    row: {},
    currentIndex: '',
    newData:[],
    current_page: 0,
    per_page: 0,
    page_total: 0,
    is_tabs: false
  },
  mutations: {
    SET_LOAD: (state,val) => {
      state.loading = val;
    },
    SET_CHANGEARR: (state, obj) => {
      state.changeData = obj;
    },
    SET_ROW: (state, row) => {
      state.row = row;
    },
    SET_URL: (state, url) => {
      state.url = url;
    },
    SET_INPUT: (state) => {
      state.inputChange = true;
    },
    SET_CURRENT: (state, index) => {
      state.currentIndex = 'index' + index;
    },
    SET_VOID: (state) => {
      state.currentIndex = '';
    },
    DO_EDIT: (state, changeData) => {
      if (state.inputChange) {
        axios.patch(
          state.url + state.row.id,
          qs.stringify(changeData)
        )
          .then(() => {
            Message({
              message: '修改成功',
              type: 'success'
            });
            state.currentIndex = '';
            state.inputChange = false;
          })
          .catch(err => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              Message.error({
                message: str
              })
            }
          })
      } else {
        Message({
          message: '数据未改动',
          type: 'info'
        });
      }
    },
    CURRENT_PAGE:(state,val)=>{
      state.current_page = val;
    },
    PER_PAGE:(state,val)=>{
      state.per_page = val;
    },
    PAGE_TOTAL:(state,val)=>{
      state.page_total = val;
    },
    GET_DATA:(state)=>{
      axios.get(state.url)
        .then(res => {
          state.newData = res.data.data;
          state.loading = false;
          let pg = res.data.meta.pagination;
          state.current_page = pg.current_page;
          state.per_page = pg.per_page;
          state.page_total = pg.total;
        })
        .catch(err => {
          Message.error({
            message: err.message
          });
        })
    },
    SET_TABS:(state,val)=>{
      state.is_tabs = val;
    }
  },
  actions: {
    setLoad({commit},val) {
      commit('SET_LOAD',val);
    },
    changeData({commit}, obj) {
      commit('SET_CHANGEARR', obj);
    },
    setUrl({commit}, url) {
      commit('SET_URL', url);
    },
    setRow({commit}, row) {
      commit('SET_ROW', row);
    },
    setInput({commit}) {
      commit('SET_INPUT');
    },
    setIndex({commit}, index) {
      commit('SET_CURRENT', index);
    },
    setVoid({commit}) {
      commit('SET_VOID');
    },
    doEdit({commit}, obj) {
      commit('DO_EDIT', obj);
    },
    currentPage({commit}, val) {
      commit('CURRENT_PAGE', val);
    },
    /*getData({state,commit}) {
      state.newData = [];
      state.loading = true;
      axios.get(state.url)
        .then(res => {
          state.newData = res.data;
          state.loading = false;
          let pg = res.data.meta.pagination;
          commit('CURRENT_PAGE',pg.current_page);
          state.per_page = pg.per_page;
          state.page_total = pg.total;
        })
        .catch(err => {
          Message.error({
            message: err.message
          });
        })
    },*/
    getData({state,commit}) {
      state.newData = [];
      state.loading = true;
      commit('GET_DATA');
    },
    //点击页码时设置页码
    setPagination({state,commit},val){
      commit('SET_URL',state.url+'?page='+val);
      axios.get(state.url)
        .then(res=>{
          state.newData = res.data;
          let pg = res.data.meta.pagination;
          commit('CURRENT_PAGE',pg.current_page);
        })
        .catch(err=>{
          Message.error({
            message: err.message
          });
        })
    },
    refresh({state,commit}){
      state.loading = true;
      commit('GET_DATA');
      setTimeout(() => {
        state.loading = false;
      }, 2000)
    },
    setTabs({commit},val){
      commit('SET_TABS',val);
    }
  }
};
export default table;