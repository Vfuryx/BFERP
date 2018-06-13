<template>
    <div>
        <h2>客服申请</h2>
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
            cnt: '删除',
            icon: 'bf-del'
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