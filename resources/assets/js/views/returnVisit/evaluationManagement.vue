<template>
    <div>
        <h2>评价管理</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '锁定',
            icon: 'bf-lock'
          },
          {
            cnt: '解锁',
            icon: 'bf-delock'
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
            cnt: '导出',
            icon: 'bf-out'
          },
          {
            cnt: '同步',
            icon: 'bf-sync'
          },
          {
            cnt: '下载',
            icon: 'bf-dwn'
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