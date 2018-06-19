<template>
    <div>
        <h2>售后退款审核</h2>
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