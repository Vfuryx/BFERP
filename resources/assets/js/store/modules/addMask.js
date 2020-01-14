const addMask= {
  state: {
    showMask: false,
    addObj: {}
  },
  mutations: {
    SET_SHOWADD: (state, val) => {
      state.showMask = val;
    },
    SET_ADDOBJ: (state, obj) => {
      state.addObj = obj;
    },
  },
  actions: {
    setShowAdd({commit}, val) {
      commit('SET_SHOWADD', val);
    },
    setAddObj({commit}, val) {
      commit('SET_ADDOBJ', val);
    }
  }
};

export default addMask;