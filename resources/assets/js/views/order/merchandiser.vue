<template>
    <div>
        <h2>跟单部</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '修改',
            icon: 'bf-change',
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
            cnt: '退审',
            icon: 'bf-auditfaild',
            ent: this.test
          },
          {
            cnt: '发货',
            icon: 'bf-deliver',
            ent: this.test
          },
          {
            cnt: '结算',
            icon: 'bf-finSettle',
            ent: this.test
          },
          {
            cnt: '批量处理',
            icon: 'bf-node',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '合并',
            icon: 'bf-merge',
            ent: this.test
          },
          {
            cnt: '拆分',
            icon: 'bf-node',
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
            cnt: '订单采购',
            icon: 'bf-purchase',
            ent: this.test
          },
          {
            cnt: '生产排单',
            icon: 'bf-machie',
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