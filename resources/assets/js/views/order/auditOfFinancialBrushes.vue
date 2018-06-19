<template>
    <div>
        <h2>财务刷单审核</h2>
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
                  cnt: '删除',
                  icon: 'bf-del',
                  ent: this.test
                },
                {
                  cnt: '提交',
                  icon: 'bf-submit',
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
                  cnt: '批量处理',
                  icon: 'bf-more',
                  ent: this.test
                },
                {
                  cnt: '导出',
                   icon: 'bf-out',
                  ent: this.test
                },
                {
                  cnt: '下载',
                  icon: 'bf-dwn',
                  ent: this.test
                },
                {
                  cnt: '还原',
                  icon: 'bf-reduce',
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