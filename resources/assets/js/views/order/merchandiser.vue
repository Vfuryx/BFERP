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
            icon: 'bf-change'
          },
          {
            cnt: '驳回',
            icon: 'bf-reject'
          },
          {
            cnt: '审核',
            icon: 'bf-audit'
          },
          {
            cnt: '退审',
            icon: 'bf-auditfaild'
          },
          {
            cnt: '发货',
            icon: 'bf-deliver'
          },
          {
            cnt: '结算',
            icon: 'bf-finSettle'
          },
          {
            cnt: '批量处理',
            icon: 'bf-node'
          },
          {
            cnt: '导出',
            icon: 'bf-out'
          },
          {
            cnt: '合并',
            icon: 'bf-merge'
          },
          {
            cnt: '拆分',
            icon: 'bf-node'
          },
          {
            cnt: '上一条',
            icon: 'bf-beforeItem'
          },
          {
            cnt: '下一条',
            icon: 'bf-nextItem'
          },
          {
            cnt: '订单采购',
            icon: 'bf-purchase'
          },
          {
            cnt: '生产排单',
            icon: 'bf-machie'
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh'
          },

        ]
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