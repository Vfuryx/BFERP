<template>
    <div>
        <h2>财务确认</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
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
            cnt: '结算',
            icon: 'bf-finSettle'
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