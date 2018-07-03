<template>
    <div>
        <el-popover
                placement="top"
                width="160"
                v-model="delShow" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delUrl,delId)">确定</el-button>
            </div>
        </el-popover>
    </div>
</template>
<script>
    export default{
      props:['delUrl','delId'],
      computed:{
        delShow: {
          get: function () {
            return this.$store.state.delMask.delShow
          },
          set: function () {}
        },
      },
      methods:{
        cancelD(){
          this.$store.dispatch('cancelD');
        },
        confirmD(url,id){
          this.$store.dispatch('confirmD',{url,id})
            .then(()=>{
            this.$store.dispatch('setUrl',this.delUrl);
              this.$store.dispatch('getData');
            });
        }
      }
    }
</script>
