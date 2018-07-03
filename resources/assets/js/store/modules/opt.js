const opt = {
  state: {
    opts: [
      {
        cnt: '编辑',
        icon: 'el-icon-edit',
        ent:'',
        ref: 'icon'
      }
    ],
    show: false,
    ok: false,
    lastOpt: []
  },
  mutations: {
   /* SET_OPT: (state, opt) => {
      state.opts = opt
    },*/
    TOGGLE_SHOW: (state) => {
      state.ok = !state.ok;
    },
    SET_OPT: (state, opts) => {
      state.opts = opts;
      //div宽度
      const leaveW = $(window).width() - $('.logo').width() - parseInt($('.opt').css('marginLeft')) - parseInt($('.opt').css('marginRight')) - parseInt($('.opt').css('paddingLeft')) - 10;
      //每个opt宽度
      const eachW = $('.list').width() + parseInt($('.list').css('marginRight'));
      //显示个数
      const num = Math.floor(leaveW / eachW);
      //opt总个数
      const amount = opts.length;
      $('.opt').width(eachW * num);
      if (leaveW < eachW * amount) {
        state.show = true;
      } else {
        state.show = false;
      }
      state.lastOpt = opts.slice(num);
    },

    /*待删*/
    change: (state, opts) => {
      //div宽度
      const leaveW = $(window).width() - $('.logo').width() - parseInt($('.opt').css('marginLeft')) - parseInt($('.opt').css('marginRight')) - parseInt($('.opt').css('paddingLeft')) - 10;
      //每个opt宽度
      const eachW = $('.list').width() + parseInt($('.list').css('marginRight'));
      //显示个数
      const num = Math.floor(leaveW / eachW);
      //opt总个数
      const amount = opts.length;
      $('.opt').width(eachW * num);
      if (leaveW < eachW * amount) {
        state.show = true;
      } else {
        state.show = false;
      }
      state.lastOpt = opts.slice(num);
    },
  },
  actions: {
    toggle_show({commit}){
      commit('TOGGLE_SHOW');
    },
    setOpt({commit},opt){
      commit('SET_OPT',opt);
    },
  }
}

export default opt;