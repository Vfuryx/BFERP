<template>
    <div>
        <h2>财务部</h2>
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
              cnt: '导出',
              icon: 'bf-out'
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
              cnt: '打印',
              icon: 'bf-printer'
            },
            {
              cnt: '刷新',
              icon: 'bf-refresh'
            },

          ]
        }
      },
      mounted(){
        this.$store.state.opt.opts = this.newOpt;
        this.$store.commit('change',this.newOpt);
        const that = this;
        $(window).resize(() => {
          return (() => {
            that.$store.state.opt.opts = that.newOpt;
            that.$store.commit('change',that.newOpt);
          })()
        })
      }
    }
</script>