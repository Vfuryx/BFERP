<template>
    <div>
        <h2>客服退款申请</h2>
    </div>
</template>
<script>
export default {
    data() {
        return {
            newOpt: [
                {
                  cnt: '新增',
                  icon: 'bf-add',
                  ent: this.test
                },
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
                  cnt: '锁定',
                  icon: 'bf-lock',
                  ent: this.test
                },
                {
                  cnt: '解锁',
                  icon: 'bf-delock',
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
                  cnt: '打印',
                  icon: 'bf-printer',
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
  mounted() {
    this.$store.state.opt.opts = this.newOpt;
  }
}
</script>