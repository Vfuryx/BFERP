<template>
    <div>
        <h2>审核校对</h2>
    </div>
</template>
<script>
export default {
    data() {
        return {
            newOpt: [
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