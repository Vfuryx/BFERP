<template>
    <div>
        <div v-if="ShortDelete">
            <el-popover
                    placement="top"
                    width="160"
                    v-model="showDelete" slot="tip">
                <p>确定删除该条数据？</p>
                <div style="text-align: right; margin: 0">
                    <el-button size="mini" type="text" @click="cancelDel">取消</el-button>
                    <el-button type="primary" size="mini" @click="confirmDel(url,id)">确定</el-button>
                </div>
            </el-popover>
        </div>
        <div v-else>
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
    </div>
</template>
<script>
    export default{
      props:['delUrl','delId','showDel','ShortDelete','visibleDel'],
      data(){
        return {
          showDelete: false,
        }
      },
      watch:{
        visibleDel:function(newValue){
          this.showDelete = newValue
        },
      },
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
        },
        cancelDel(){
          this.$message({
            message: '取消删除',
            type: 'info'
          });
          this.showDelete = false;
        },
        confirmDel(url,id){
          this.$del(url+'/'+id)
            .then(()=>{
              this.$message({
                message: '删除成功',
                type: 'success'
              });
              this.showDelete = false;
              // this.showDel = false;
             /* this.showDel = false;
              this.refresh();*/
            },err=>{
              if (err.response) {
                this.showDelete = false;
                // this.visibleDel = false;
                let arr = err.response.data.errors;
                let arr1 = [];
                for (let i in arr) {
                  arr1.push(arr[i]);
                }
                let str = arr1.join(',');
                this.$message.error({
                  message: str
                });
              }
            })
        },
      }
    }
</script>
