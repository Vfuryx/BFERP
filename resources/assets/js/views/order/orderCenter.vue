<template>
    <div>
        <h2>订单中心</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.test
          },
          {
            cnt: '退审',
            icon: 'bf-audit',
            ent: this.test
          },
          {
            cnt: '导入',
            icon: 'bf-in',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '同步',
            icon: 'bf-sync',
            ent: this.test
          },
          {
            cnt: '上一条',
            icon: 'bf-beforeItem',
            ent: this.test
          },
          {
            cnt: '下一条',
            icon: 'bf-nextItem',
            ent: this.test
          },
          {
            cnt: '门店收款',
            icon: 'bf-receManagement',
            ent: this.test
          },
          {
            cnt: '还原',
            icon: 'bf-reduce',
            ent: this.test
          },
          {
            cnt: '转赠品',
            icon: 'bf-gift',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.test
          }
        ]
      }
    },
    methods:{
      test(){
        console.log(1);
      }
    },
    mounted() {
      this.$store.state.opt.opts = this.newOpt;
      this.$store.commit('change', this.newOpt);
      const that = this;
      $(window).resize(() => {
        return (() => {
          that.$store.state.opt.opts = that.newOpt;
          that.$store.commit('change', that.newOpt);
        })()
      })
    }
  }
</script>