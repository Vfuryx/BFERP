<template>
    <div>
        <h2>角色用户关联</h2>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '角色权限',
            icon: 'bf-jurisdiction',
            ent: this.test
          },
          {
            cnt: '角色用户',
            icon: 'bf-juruser',
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