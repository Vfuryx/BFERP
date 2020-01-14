<template>
    <div>
        <el-pagination
                @current-change="handleCurrentChange"
                :current-page="currentPage"
                :page-size="per_page"
                layout="total, prev, pager, next, jumper"
                :total="page_total">
            </el-pagination>
        </div>
</template>
<script>
  export default {
    props:['pageUrl'],
    computed:{
      currentPage:{
        get: function(){
          return this.$store.getters.current_page;
        },
        set: function(){}
      },
      per_page:{
        get: function(){
          return this.$store.getters.per_page;
        },
        set:function(){}
      },
      page_total:{
        get: function(){
          return this.$store.getters.page_total;
        },
        set:function(){}
      }
    },
    methods: {
      handleCurrentChange(val) {
        // console.log(val);
        // this.$store.commit('SET_URL',this.pageUrl);
        // this.$store.dispatch('setPagination',val);
        this.$emit('handlePagChg',val)
      }
    }
  }
</script>