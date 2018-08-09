import axios from 'axios'
const responseData= {
  state: {
    warehouses:[],
    platForm:[],
    printreports:[],
    freighttypes:[],
    suppliers:[],
    goodscates:[],
    distmets:[],
    shops:[],
    stockintypes:[],
  },
  mutations: {
    GET_WAREHOUSE: (state, arr) => {
      state.warehouses = arr;
    },
    GET_PLATFORM: (state, arr) => {
      state.platForm = arr;
    },
    PRINT_REPORTS:(state, arr)=>{
      state.printreports = arr;
    },
    FREIGHT_TYPE:(state, arr)=>{
      state.freighttypes = arr;
    },
    SUPPLIERS:(state, arr)=>{
      state.suppliers = arr;
    },
    GOODS_CATE:(state, arr)=>{
      state.goodscates = arr;
    },
    DISTMET:(state, arr)=>{
      state.distmets = arr;
    },
    SHOPS:(state, arr)=>{
      state.shops = arr;
    },
    STOCKINTYPE:(state, arr)=>{
      state.stockintypes = arr;
    },

  },
  actions: {
    warehouses({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('GET_WAREHOUSE', res.data.data);
          return
        })
    },
    getPlatForm({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('GET_PLATFORM', res.data.data);
          return
        })
    },
    printreports({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('PRINT_REPORTS', res.data.data);
          return res.data.data
        })
    },
    freighttypes({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('FREIGHT_TYPE', res.data.data);
          return res.data.data
        })
    },
    suppliers({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('SUPPLIERS', res.data.data);
          return res.data.data
        })
    },
    goodscates({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('GOODS_CATE', res.data.data);
          return res.data.data
        })
    },
    distmets({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('DISTMET', res.data.data);
          return res.data.data
        })
    },
    shops({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('SHOPS', res.data.data);
          return res.data.data
        })
    },
    stockintypes({commit}, url) {
      axios.get(url)
        .then(res=>{
          commit('STOCKINTYPE', res.data.data);
          return res.data.data
        })
    },
  }
};

export default responseData;