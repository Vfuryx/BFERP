<template>
    <div>
        <div class="searchBox" v-if="currentPage">
                <span>
                <label>商品简称</label>
                <el-input v-model="searchBox.buyNick" clearable class="half" @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>规格名称</label>
                <el-input v-model="searchBox.shopTitle" clearable class="half" @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>包含材料</label>
                <el-input v-model="searchBox.shopTitle" clearable class="half" @keyup.enter.native="getData"></el-input>
            </span>
        </div>
        <h2>产品Bom</h2>
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
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.test
          }
        ],
        searchBox:{
          buyNick:'',
          shopTitle:''
        },
        currentPage: true
      }
    },
    methods:{
      test(){
        console.log(1);
      },
      getData(){
        alert(this.searchBox);
        console.log(this.searchBox);
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