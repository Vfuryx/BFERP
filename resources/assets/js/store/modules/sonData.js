const sonData = {
  state:{
    warehouse:[],
    platforms:[],
    series:[],
    suppliers:[],
  },
  mutations:{
    SET_WAREHOUSE: (state, val) => {
      state.warehouse = val;
    },
    SET_PLATFORM: (state, val) => {
      state.platforms = val;
    },
    SET_SERIES: (state, val) => {
      state.series = val;
    },
    SET_SUPPLIERS: (state, val) => {
      state.suppliers = val;
    },

  },
  actions:{
    setWarehouse({commit},val) {
      commit('SET_WAREHOUSE',val);
    },
    setPlatform({commit},val) {
      commit('SET_PLATFORM',val);
    },
    setSeries({commit},val) {
      commit('SET_SERIES',val);
    },
    setSuppliers({commit},val) {
      commit('SET_SUPPLIERS',val);
    },


  }
};

export default sonData;