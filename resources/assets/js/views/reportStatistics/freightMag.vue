<template>
    <div>
        <h2>运费管理报表</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '导出',
            icon: 'bf-out'
          },
          {
            cnt: '下载',
            icon: 'bf-dwn'
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh'
          }

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