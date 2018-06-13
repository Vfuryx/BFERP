<template>
    <div>
        <h2>短信模板</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add'
          },
          {
            cnt: '修改',
            icon: 'bf-change'
          },
          {
            cnt: '还原',
            icon: 'bf-reduce'
          },
          {
            cnt: '作废',
            icon: 'bf-void'
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