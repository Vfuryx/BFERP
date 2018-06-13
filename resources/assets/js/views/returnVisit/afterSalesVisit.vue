<template>
    <div>
        <h2>售后回访</h2>
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
            cnt: '退审',
            icon: 'bf-auditfaild'
          },
          {
            cnt: '批量处理',
            icon: 'bf-more'
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
            cnt: '回访',
            icon: 'bf-revisit'
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