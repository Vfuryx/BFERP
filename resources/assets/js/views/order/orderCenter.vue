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
            icon: 'bf-del'
          },
          {
            cnt: '退审',
            icon: 'bf-audit'
          },
          {
            cnt: '导入',
            icon: 'bf-in'
          },
          {
            cnt: '导出',
            icon: 'bf-out'
          },
          {
            cnt: '同步',
            icon: 'bf-sync'
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
            cnt: '门店收款',
            icon: 'bf-receManagement'
          },
          {
            cnt: '还原',
            icon: 'bf-reduce'
          },
          {
            cnt: '转赠品',
            icon: 'bf-gift'
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