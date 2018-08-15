<template>
    <div>
        <div class="searchBox">
            <span>
                <label>退货单号</label>
                <el-input v-model.trim="searchBox.returnOrder" clearable @keyup.enter.native="handleQuery"></el-input>
            </span>
            <span>
                <label>退回供应商</label>
                <el-select v-model="searchBox.supplier" clearable placeholder="请选择" @keyup.enter.native="handleQuery">
                    <el-option v-for="item in resData.suppliers" :key="item.value" :label="item.name" :value="item.id"></el-option>
                </el-select>
            </span>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.test
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.test
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.test
          },
          {
            cnt: '提交',
            icon: 'bf-submit',
            ent: this.test
          },
          {
            cnt: '驳回',
            icon: 'bf-reject',
            ent: this.test
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '打印',
            icon: 'bf-printer',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.test
          }
        ],
        searchBox:{
          returnOrder:'',
          supplier:''
        },
      }
    },
    computed:{
      resData:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      },
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      }
    },
    methods:{
      test(){
        console.log(1);
      },
      handleQuery(){
        this.$fetch()
          .then(res=>{},err=>{})
      },


    },
    mounted() {
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      })
    }
  }
</script>