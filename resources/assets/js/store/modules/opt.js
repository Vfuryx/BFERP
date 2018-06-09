const opt = {
    state:{
        opts:[
            {
                cnt:'编辑',
                icon:'el-icon-edit',
                // text:''
            },
            {
                cnt:'分享',
                icon: 'el-icon-share',
                // text:''
            },
            {
                cnt:'搜索',
                icon: 'el-icon-search',
                // text:'搜索'
            },
            {
                cnt:'上传',
                icon: 'el-icon-upload'
            }
        ]
        // opts:'23'
    },
    mutations:{
        GET_OPT:(state,opt)=>{
            state.opts=opt
        }
    },
    actions:{
        getOpt:(commit)=>{
            commit('GET_OPT');
        }
    }
}

export default opt;