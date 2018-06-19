<template>
    <div>
        <h2>customerService客服部</h2>
    </div>
</template>
<script>
export default{
    data(){
        return {
            newOpt:[
                {
                  cnt:'增加',
                  icon:'bf-add',
                  ent: this.test,
                  ref: 'add'
                },
                {
                  cnt:'修改',
                  icon:'bf-change',
                  ent: this.test
                },
                {
                  cnt:'删除',
                  icon:'bf-del',
                  ent: this.test
                },
                {
                  cnt:'锁定',
                  icon:'bf-lock',
                  ent: this.test
                },
                {
                  cnt:'解锁',
                  icon:'bf-delock',
                  ent: this.test
                },
                {
                  cnt:'审核',
                  icon:'bf-audit',
                  ent: this.test
                },
                {
                  cnt:'退审',
                  icon:'bf-auditfaild',
                  ent: this.test
                },
                {
                  cnt:'导出',
                  icon:'bf-out',
                  ent: this.test
                },
                {
                  cnt:'合并',
                  icon:'bf-merge',
                  ent: this.test
                },
                {
                  cnt:'拆分',
                  icon:'bf-node',
                  ent: this.test
                },
                {
                  cnt:'转刷单',
                  icon:'bf-transa',
                  ent: this.test
                },
                {
                  cnt:'上一条',
                  icon:'bf-beforeItem',
                  ent: this.test
                },
                {
                  cnt:'下一条',
                  icon:'bf-nextItem',
                  ent: this.test
                },
                {
                  cnt:'转补款',
                  icon:'bf-transferAcc',
                  ent: this.test
                },
                {
                  cnt:'订单关联',
                  icon:'bf-asso',
                  ent: this.test
                },
                {
                  cnt:'取消关联',
                  icon:'bf-cancelAsso',
                  ent: this.test
                },
                {
                  cnt:'通知发货',
                  icon:'bf-deliNotice',
                  ent: this.test
                },
                {
                  cnt:'打印',
                  icon:'bf-printer',
                  ent: this.test
                },
                {
                  cnt:'转送款',
                  icon:'bf-giveMoney',
                  ent: this.test
                },
                {
                  cnt:'刷新',
                  icon:'bf-refresh',
                  ent: this.test
                }
            ]
        }
    },
    computed:{

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