<template>
    <div>
        <h2>Customer level客户等级</h2>
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
            cnt: '还原',
            icon: 'bf-reduce',
            ent: this.test
          },
          {
            cnt: '作废',
            icon: 'bf-void',
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