<template>
    <div>
        <!--表格-->
        <div ref="table">
            <!--ref="multipleTable" -->
            <el-table :data="tableData" fit highlight-current-row @selection-change="handleSelectionChange"
                      type="index"
                      v-loading="loading"
                      element-loading-text="拼命加载中"
                      element-loading-spinner="el-icon-loading"
                      element-loading-background="rgba(0, 0, 0, 0.6)"
            >
                <el-table-column
                        type="selection"
                        width="95" align="center" :checked="checkboxInit" @change="toggleChecked">
                </el-table-column>
                <el-table-column v-for="(item,index) in tableKey" :label="item.label" align="center" width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="currentIndex =='index'+scope.$index">
                            <span v-if="item.type=='color'">
                                 <el-color-picker v-model="scope.row[item.prop]" @change="handleEdit" size="mini"></el-color-picker>
                            </span>
                            <span v-else-if="item.type == 'select_stu'">
                                 <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit">
                                     <el-option label="0-停用" value="0"></el-option>
                                     <el-option label="1-启用" value="1"></el-option>
                                 </el-select>
                            </span>
                            <span v-else-if="item.type == 'select_def'">
                                 <el-select v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit">
                                     <el-option label="0-否" value="0"></el-option>
                                     <el-option label="1-是" value="1"></el-option>
                                 </el-select>
                            </span>
                             <span v-else-if="item.type == 'textarea'">
                                  <el-input type="textarea" size="small" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else>
                               <el-input size="small" v-model="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit"></el-input>
                            </span>
                     </span>
                        <span v-else>
                             <span v-if="item.type=='color'">
                                 <span class="tableColor" :style="{backgroundColor:scope.row.color}"></span>
                         {{scope.row[item.prop]}}
                            </span>
                            <span v-else-if="item.type=='select_stu'">
                                <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                                 {{scope.row[item.prop]==0?'停用':'启用'}}
                            </span>
                            <span v-else-if="item.type=='select_def'">
                                 {{scope.row[item.prop]==0?'否':'是'}}
                            </span>
                            <span v-else>
                                 {{scope.row[item.prop]}}
                            </span>
                     </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" align="center" width="220">
                    <template slot-scope="scope">
                     <span v-if="currentIndex =='index'+scope.$index">
                         <el-button size="mini" @click="editSave(scope.row)">保存
                     </el-button>
                         <el-button
                                 size="mini"
                                 @click="editCancle">取消
                     </el-button>
                     </span>
                        <span v-else>
                         <el-button
                                 size="mini"
                                 @click="edit(scope.$index)">编辑
                     </el-button>
                    </span>
                        <el-button
                                size="mini"
                                type="danger"
                                @click="del(scope.row,$event)">删除
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>
        </div>

        <!--删除-->
        <del-mask :del-id="newId" :del-url="url"></del-mask>

        <!--批量删除-->
        <message-box></message-box>

        <!--页码-->
        <Pagination :page-url="url"></Pagination>

    </div>
</template>
<script>
  export default {
    props:['tableKey','url'],
    data() {
      return {
        checkboxInit: false,
        newId: '',
        //批量删除
        delArr: []
      }
    },
    computed:{
     loading:{
       get: function(){
         return this.$store.getters.loading
       }
     },
      //当前id
      currentIndex:{
        get:function(){
          return this.$store.getters.currentIndex
        },
        set:function(){

        }
      },
      tableData:{
       get:function(){
         return this.$store.state.table.newData.data;
       },
        set:function(){}
      }
    },
    methods: {
      //切换选中
      toggleChecked() {
        this.checkboxInit = !this.checkboxInit;
      },
      //删除
      del(row, e) {
        this.$store.dispatch('setShow', true);
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.newId = "/" + row.id;
      },
      //批量删除
      handleSelectionChange(val) {
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      delMore() {
        this.$store.dispatch('setUrl',this.url);
        this.$store.dispatch('setDelArr',this.delArr);
        this.$store.dispatch('delMore')
          .then(()=>{
            this.getData();
          });
      },
      //刷新
      refresh() {
        this.$store.dispatch('setLoad',true);
        this.getData();
        setTimeout(() => {
          this.$store.dispatch('setLoad',false);
        }, 2000)
      },
      //编辑
      edit(index) {
        this.$store.dispatch('setIndex',index);
      },
      handleEdit() {
        this.$store.dispatch('setInput');
      },
      //保存修改
      editSave(row) {
        this.$emit('edit',row);
      },
      //取消修改
      editCancle() {
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.$store.dispatch('setVoid');
      },
      getData(){
        this.$store.dispatch('setUrl',this.url);
        this.$store.dispatch('getData');
      }
    },
    mounted() {
      this.getData();
      this.$nextTick(function () {
        this.$on('delMore',this.delMore);
        this.$on('refresh',this.refresh)
      })
    },
  }
</script>
<style lang="scss" scoped>
    .el-table_1_column_7 {
        .cell {
            i {
                margin-right: 5px;
                cursor: pointer;
            }
        }
    }
</style>

