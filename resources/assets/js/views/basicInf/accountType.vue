<!--
<template>
    <div>
        <template>
            &lt;!&ndash;数据&ndash;&gt;
            <el-table
                    :data="accountType" fit highlight-current-row
                   type="index"
                    @selection-change="handleSelectionChange"
                    element-loading-text="拼命加载中"
                    v-loading="loading"
                    element-loading-spinner="el-icon-loading"
                    element-loading-background="rgba(0, 0, 0, 0.6)"
            >
                <el-table-column
                        type="selection"
                        width="95" align="center"
                        :checked="checkboxInit" @change="toggleChecked">
                </el-table-column>
                <el-table-column
                        label="类型"
                        align="center"
                        width="220">
                    <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.name" placeholder="输入类型" @change="handleEdit()"></el-input>
                        </span>
                        <span v-else>
                            {{scope.row.name}}
                        </span>
                    </template>
                </el-table-column>
                <el-table-column
                        label="状态"
                        align="center"
                        width="220">
                    <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-select v-model="scope.row.status" placeholder="状态" @change="handleEdit()">
                                <el-option v-for="item in status" :key="item.value" :label="item.label" :value="item.value"></el-option>
                            </el-select>
                        </span>
                        <span v-else>
                            <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                            {{scope.row.status==0?'停用':'启用'}}
                        </span>
                    </template>
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        label="创建时间"
                        align="center">
                </el-table-column>
                <el-table-column label="操作" width="220" align="center">
                    <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-button size="mini" @click="editSave(scope.$index,scope.row)">保存</el-button>
                            <el-button size="mini" @click="editCancel">取消
                            </el-button>
                        </span>
                        <span v-else>
                           <el-button size="mini" @click="editType(scope.row,scope.$index)">编辑</el-button>
                        </span>
                        <el-button size="mini" type="danger" @click="delClick(scope.row,$event)">删除
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>

            &lt;!&ndash;添加面板&ndash;&gt;
            <el-dialog title="新增记账类型" :visible.sync="showMask">
                <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
                    <el-form-item label="类型" prop="name">
                        <el-input v-model="ruleForm.name" placehold=""></el-input>
                    </el-form-item>
                    <el-form-item label="状态">
                        <el-select v-model="ruleForm.status" placeholder="请选择状态">
                            <el-option label="停用" value="0"></el-option>
                            <el-option label="启用" value="1"></el-option>
                        </el-select>
                    </el-form-item>
                </el-form>
                <div slot="footer" class="dialog-footer">
                    <el-button type="primary" @click="submitForm('ruleForm')">添加</el-button>
                    <el-button @click="resetForm('ruleForm')">重置</el-button>
                </div>
            </el-dialog>

            &lt;!&ndash;分页&ndash;&gt;
            <div ref="pagination">
                <el-pagination
                        @current-change="handleCurrentChange"
                        :current-page="pagination.current_page"
                        :page-size="pagination.per_page"
                        layout="total, prev, pager, next, jumper"
                        :total="pagination.total">
                </el-pagination>
            </div>

            &lt;!&ndash;删除提示&ndash;&gt;
            <el-popover
                    placement="top"
                    width="160"
                    v-model="showDel" slot="tip">
                <p>确定删除该条数据？</p>
                <div style="text-align: right; margin: 0">
                    <el-button size="mini" type="text" @click="delCancel">取消</el-button>
                    <el-button type="primary" size="mini" @click="delConfirm(delId)">确定</el-button>
                </div>
            </el-popover>
        </template>
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
            ent: this.addType
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        accountType: [],
        showMask: false,
        ruleForm: {
          name:'',
          status: '1'
        },
        rules: {
          name: [
            {required: true, message: '请输入类型名', trigger: 'blur'},
          ]
        },
        pagination: {
          current_page: 1,
          total: 0,
          per_page: 0
        },
        showDel: false,
        delId:'',
        delArr: [],
        checkboxInit: false,
        multipleSelection: [],
        changeIndex:'',
        inputChange: false,
        status:[
          {
            value: '0',
            label: '0-停用'
          },
          {
            value: '1',
            label: '1-启用'
          }
        ],
        loading: true
      }
    },
    methods:{
      //修改opt宽度
     /* changeOptWidth(){
        this.$store.state.opt.opts = this.newOpt;
        this.$store.commit('change', this.newOpt);
      },*/
      //获取数据
      getAccountType(){
        this.$fetch('/acctypes')
          .then(res=>{
            this.accountType = res.data;
            this.loading = false;
            let pg = res.meta.pagination;
            this.pagination.current_page = pg.current_page;
            this.pagination.total = pg.total;
            this.pagination.per_page = pg.per_page;
          },err=>{
            if (err.response) {
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
      //添加
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            var data = {
              name: this.ruleForm.name,
              status: this.ruleForm.status
            };
            this.$post('/acctypes', data)
              .then(() => {
                this.$message({
                  message: '添加成功',
                  type: 'success'
                });
                this.showMask = false;
                this.getAccountType();
              }, (err) => {
                if (err.response) {
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
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      //格式化输入
      resetForm(formName) {
        this.$refs[formName].resetFields();
      },
      //新增
      addType(){
        this.showMask = true;
        this.ruleForm.name='';
      },
      //分页请求
      handleCurrentChange(val) {
        this.$fetch('/acctypes?page=' + val).then(res => {
          this.accountType = res.data;
          let pg = res.meta.pagination;
          this.pagination.current_page = pg.current_page;
        }, err => {
          if (err.response) {
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
        });
      },
      //刷新
      refresh(){
        this.loading = true;
        this.getAccountType();
        setTimeout(()=> {
          this.loading = false;
        }, 2000)
      },
      //点击删除
      delClick(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
      },
      //执行删除
      delConfirm(id){
        this.$del('/acctypes/'+id)
          .then(()=>{
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.getAccountType();
          },err=>{
            if (err.response) {
              this.showDel = false;
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
      //取消删除
      delCancel(){
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      toggleChecked(){
        this.checkboxInit = !this.checkboxInit;
      },
      handleSelectionChange(val){
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      //批量删除
      delMore(){
        if (this.delArr.length === 0) {
          this.$message({
            message: '没有选中数据',
            type: 'warning'
          });
        } else {
          this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
            confirmButtonText: '确定',
            cancelButtonText: '取消',
            type: 'warning'
          }).then(() => {
            this.$del("/acctypes", {ids: this.delArr})
              .then(() => {
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
                this.getAccountType();
              },err=>{
                if (err.response) {
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
          }).catch(() => {
            this.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      },
      //  修改
      editType(row,index){
        this.changeIndex = `index${index}`;
      },
      handleEdit(){
        this.inputChange = true;
      },
      //保存修改
      editSave(index,row){
        let newData = {
          id: row.id,
          name: row.name,
          status: row.status
        };
        if(this.inputChange){
          this.$patch('/acctypes/'+row.id,newData)
            .then(()=>{
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.changeIndex ='';
              this.inputChange = false;
            },err=>{
              if(err.response){
                let arr = err.response.data.errors;
                let arr1 = [];
                for (let i in arr) {
                  arr1.push(arr[i]);
                }
                let str = arr1.join(',');
                this.$message.error({
                  message: str
                })
              }
            })
        }else{
          this.$message({
            message: '数据未改动',
            type: 'info'
          });
        }
      },
      editCancel(){
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.changeIndex = '';
      }
    },
    mounted() {
      this.$store.dispatch('setOpt',this.newOpt);
      // this.changeOptWidth();
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      })
      this.getAccountType();
    }
  }
</script>
<style lang="scss" scoped></style>-->
<!--
<template>
    <div>
        <my-table :table-key="tableKey" @edit="edit" ref="table" :url="url"></my-table>

        &lt;!&ndash;新增&ndash;&gt;
        <add-mask :showMask="showAdd" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr"  :url="url"></add-mask>
    </div>
</template>
<script>
  export default {
    data(){
      return {
        //操作
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.doDelMore
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        //表格
        tableKey:[
          {
            label: '类型',
            width: '280',
            prop: "name",
            holder:'输入类型',
            type: 'text'
          },
          {
            label: '状态',
            width: '280',
            prop: "status",
            holder: '状态',
            type: 'select_stu'
          }
        ],
        url:'/acctypes',
        //新增
        showAdd: false,
        title: '新增记账类型',
        ruleForm: {
          name: '',
          status: '1'
        },
        rules: {
          name: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ]
        },
        addArr:[
          {
            label:'类型',
            prop:'name',
            holder:'请输入类型',
            type: 'text'
          },
          {
            label:'状态',
            prop:'status',
            holder:'请选择状态',
            type: 'select_stu'
          }
        ]
      }
    },
    methods:{
      //新增
      addNew(){
        this.$store.dispatch('setShowAdd',true);
      },

      edit(row){
        let obj = {
          id: row.id,
          name: row.name,
          status: row.status
        };
        this.$store.dispatch('setRow',row);
        this.$store.dispatch('setUrl',this.url+"/");
        this.$store.dispatch('doEdit',obj);
      },

      doDelMore(){
        this.$refs.table.$emit('delMore')
      },
      refresh(){
        this.$refs.table.$emit('refresh')
      },
    },
    mounted(){
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>

-->

<template>
    <div>
        <v-tabs :table-key="tableKey" :url="url" @edit="edit" ref="tabs" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr"></v-tabs>
    </div>
</template>
<script>
  export default {
    data(){
      return {
        //操作
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.doDelMore
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        //表格
        tableKey:[[
          {
            label: '类型',
            width: '280',
            prop: "name",
            holder:'输入类型',
            type: 'text'
          },
          {
            label: '状态',
            width: '280',
            prop: "status",
            holder: '状态',
            type: 'select_stu',
            doSort: true
          }
        ]],
        url:['/acctypes'],
        title: ['新增记账类型'],
        ruleForm: [{
          name: '',
          status: '1'
        }],
        rules: [{
          name: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ]
        }],
        addArr:[[
          {
            label:'类型',
            prop:'name',
            holder:'请输入类型',
            type: 'text'
          },
          {
            label:'状态',
            prop:'status',
            holder:'请选择状态',
            type: 'select_stu'
          }
        ]]
      }
    },
    methods:{
      //新增
      addNew(){
        this.$store.dispatch('setShowAdd',true);
      },

      edit(row){
        let obj = {
          id: row.id,
          name: row.name,
          status: row.status
        };
        this.$store.dispatch('setRow',row);
        this.$store.dispatch('setUrl',this.url[0]+"/");
        this.$store.dispatch('doEdit',obj);
      },

      doDelMore(){
        this.$refs.tabs.$emit('delMore')
      },
      refresh(){
        this.$store.dispatch('refresh');
      },
    },
    mounted(){
      this.$store.dispatch('setTabs',false);
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>


