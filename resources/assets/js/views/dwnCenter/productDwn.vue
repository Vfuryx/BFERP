<template>
    <div>
        <h2>商品下载</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '同步',
            icon: 'bf-sync',
            ent: this.test
          },
          {
            cnt: '下载',
            icon: 'bf-dwn',
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