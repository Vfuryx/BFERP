<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane label="费用类型管理" name="type">
                <el-table
                        :data="expenseType" fit
                        height=400
                        @selection-change="handleSelectionChange"
                        v-loading="loading">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit" @change="toggleChecked">
                    </el-table-column>
                    <el-table-column
                            label="类别"
                            align="center"
                            width="160">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                 <el-select size="small" v-model="scope.row.fee_category_id" placeholder="请选择类型" @change="handleEdit">
                        <el-option v-for="item in resData['feecates']" :label="item.name" :value="item.id" :key="item.id"></el-option>
                    </el-select>
                        </span>
                            <span v-else>
                            {{scope.row['feeCategory']
.name}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="类型名称"
                            align="center"
                            width="160">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.name" placeholder="输入名称" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.name}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="代码"
                            align="center"
                            width="200">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.code" placeholder="输入代码" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.code}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="默认"
                            align="center"
                            width="120">
                        <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                        <el-checkbox v-model="scope.row.is_default"></el-checkbox>
                    </span>
                            <span v-else>
                                 <el-checkbox v-model="scope.row.is_default" disabled></el-checkbox>
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="状态"
                            align="center"
                            width="120">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                             <el-checkbox v-model="scope.row.status"></el-checkbox>
                        </span>
                            <span v-else>
                                <el-checkbox v-model="scope.row.status" disabled></el-checkbox>
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="备注"
                            width="160"
                            align="center">
                        <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.remark" placeholder="输入备注" @change="handleEdit" type="textarea"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.remark}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" align="center"  width="150">
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
            </el-tab-pane>
            <el-tab-pane label="费用类别管理" name="cage">
                <el-table
                        :data="feeCage" fit
                        height=400
                        @selection-change="handleSelectionChange"
                        v-loading="loading"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit" @change="toggleChecked">
                    </el-table-column>
                    <el-table-column
                            label="名称"
                            align="center">
                        <template slot-scope="scope">
                        <span v-if="cateIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.name" placeholder="输入名称" @change="handleEdit"></el-input>
                        </span>
                            <span v-else>
                            {{scope.row.name}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="状态"
                            align="center">
                        <template slot-scope="scope">
                        <span v-if="cateIndex=='index'+scope.$index">
                             <el-checkbox v-model="scope.row.status"></el-checkbox>
                        </span>
                            <span v-else>
                                 <el-checkbox v-model="scope.row.status" disabled></el-checkbox>
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" align="center">
                        <template slot-scope="scope">
                        <span v-if="cateIndex=='index'+scope.$index">
                            <el-button size="mini" @click="editSave2(scope.$index,scope.row)">保存</el-button>
                            <el-button size="mini" @click="editCancel2">取消
                            </el-button>
                        </span>
                            <span v-else>
                           <el-button size="mini" @click="editCate(scope.row,scope.$index)">编辑</el-button>
                        </span>
                            <el-button size="mini" type="danger" @click="delClick2(scope.row,$event)">删除
                            </el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--添加费用类型-->
        <el-dialog title="新增费用类型" :visible.sync="showAdd">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
                <el-form-item label="费用类别" prop="type">
                    <el-select v-model="ruleForm.type" placeholder="请选择状态">
                        <el-option v-for="item in resData['feecates']" :label="item.name" :value="item.id" :key="item.id"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="费用名称
" prop="name">
                    <el-input v-model="ruleForm.name" placehold="请输入标记名称"></el-input>
                </el-form-item>
                <el-form-item label="费用代码
" prop="code">
                    <el-input v-model="ruleForm.code" placehold="请输入标记名称"></el-input>
                </el-form-item>
                <el-form-item label="类别备注
" prop="mark">
                    <el-input type="textarea" v-model="ruleForm.mark" placehold="请输入标记名称"></el-input>
                </el-form-item>
                <el-form-item label="是否默认
" prop="default">
                    <el-checkbox v-model="ruleForm.default"></el-checkbox>
                </el-form-item>
                <el-form-item label="状态" prop="status">
                    <el-checkbox v-model="ruleForm.status"></el-checkbox>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="submitForm('ruleForm')">添加</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </div>
        </el-dialog>

        <!--添加费用类别-->
        <el-dialog title="新增费用类别" :visible.sync="showCage">
            <el-form :model="ruleForm2" :rules="rules2" ref="ruleForm2" label-width="100px" class="demo-ruleForm">
                <el-form-item label="费用名称
" prop="name">
                    <el-input v-model="ruleForm2.name" placehold="请输入标记名称"></el-input>
                </el-form-item>
                <el-form-item label="状态">
                    <el-select v-model="ruleForm2.status" placeholder="请选择状态">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1"></el-option>
                    </el-select>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="submitForm2('ruleForm2')">添加</el-button>
                <el-button @click="resetForm('ruleForm2')">重置</el-button>
            </div>
        </el-dialog>

        <!--分页-->
        <div ref="pagination" id="page">
            <el-pagination
                    @current-change="handleCurrentChange"
                    :current-page="pagination.current_page"
                    :page-size="pagination.per_page"
                    layout="total, prev, pager, next, jumper"
                    :total="pagination.total">
            </el-pagination>
        </div>

        <!--删除提示-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delId)">确定</el-button>
            </div>
        </el-popover>

        <!--删除提示-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel2" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD2(delId)">确定</el-button>
            </div>
        </el-popover>
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
            ent: this.addExpense
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
        expenseType:[],
        checkboxInit: false,
        inputChange: false,
        changeIndex:'',
        multipleSelection: [],
        loading: true,
        showAdd: false,
        ruleForm: {
          type: '',
          name: '',
          code: '',
          default: false,
          mark:'',
          status: true
        },
        rules:{
          type: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ],
          name: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ],
          code: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ],
          mark: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ]
        },
        pagination: {
          current_page: 1,
          total: 0,
          per_page: 0
        },
        showDel: false,
        delId:'',
        delArr:[],
        defArr:[
          {
            value: '0',
            label: '0-否'
          },
          {
            value: '1',
            label: '1-是'
          }
        ],
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
        feeCage:[],
        activeName: 'type',
        expenseCage:[],
        showCage: false,
        ruleForm2: {
          name: '',
          status:'1'
        },
        rules2:{
          name: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ]
        },
        showDel2: false,
        cateIndex: '',
      }
    },
    computed:{
      resData:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      },
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      }
    },
    methods:{
      getExpenseType(){
        this.$fetch(this.urls.feetypes,{include:'feeCategory'})
          .then(res=>{
            this.expenseType = res.data;
            this.loading = false;
            let pg = res.meta.pagination;
            this.$store.dispatch('feecates','/feecates');
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
      addExpense(){
        this.showAdd = true;
      },
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            let data = {
              fee_category_id: this.ruleForm.type,
              name: this.ruleForm.name,
              code: this.ruleForm.code,
              remark: this.ruleForm.mark,
              is_default: this.ruleForm.default,
              status: this.ruleForm.status
            };
            this.$post(this.urls.feetypes, data)
              .then(() => {
                this.showAdd = false;
                this.resetForm('ruleForm');
                this.getExpenseType();
                this.$message({
                  message: '添加成功',
                  type: 'success'
                });
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
      resetForm(formName) {
        this.$refs[formName].resetFields();
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
      handleEdit(){
        this.inputChange = true;
      },
      editType(row,index){
        this.changeIndex = `index${index}`;
      },
      editCate(row,index){ this.cateIndex = `index${index}`;},
      editSave(index,row){
        let newData = {
          id: row.id,
          fee_category_id: row.fee_category_id,
          name: row.name,
          code: row.code,
          is_default: row.is_default,
          status: row.status,
          remark: row.remark
        };
        this.$patch(this.urls.feetypes+'/'+row.id,newData)
          .then(()=>{
            this.loading = true;
            this.getExpenseType();
            setTimeout(()=>{
              this.loading = false;
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.changeIndex ='';
              this.inputChange = false;
            },2000)
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
      },
      delClick(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
      },
      editCancel(){
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.changeIndex = '';
      },
      refresh(){
        this.loading = true;
        this.getExpenseType();
        setTimeout(()=>{
          this.loading = false;
        },2000);
      },
      handleCurrentChange(val){
        this.$fetch(this.urls.feetypes+'?page=' + val).then((res) => {
          this.expenseType = res.data;
          let pg = res.meta.pagination;
          this.pagination.current_page = pg.current_page;
        }, (err) => {
          this.$message.error({
            message: err.message
          });
        });
      },
      cancelD(){
        this.showDel = false;
        this.showDel2 = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(id){
        this.$del(this.urls.feetypes+id)
          .then(()=>{
            this.showDel = false;
            this.getExpenseType();
            this.$message({
              message: '删除成功',
              type: 'success'
            });
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
            this.$del(this.urls.feetypes, {ids: this.delArr})
              .then(() => {
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
                this.getExpenseType();
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
    //  获取费用类别
      getExpenseCage(){
        this.$fetch(this.urls.feecates)
          .then(res=>{
            this.feeCage = res.data;
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
      handleClick() {
        if($('#tab-type').hasClass('is-active')){
          this.newOpt[0].ent = this.addExpenseCage;
          this.newOpt[1].ent = this.delMoreCage;
          this.newOpt[2].ent = this.refreshCage;
          $('#page').hide();
        }else{
          this.newOpt[0].ent = this.addExpense;
          this.newOpt[1].ent = this.delMore;
          this.newOpt[2].ent = this.refresh;
          $('#page').show();
        }
      },
      //  新增
      addExpenseCage(){
        this.showCage = true;
        this.ruleForm2.name='';
      },
      submitForm2(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            let data = {
              name: this.ruleForm2.name,
              status: this.ruleForm2.status
            };
            this.$post(this.urls.feecates, data)
              .then(() => {
                this.showCage = false;
                this.getExpenseCage();
                this.$message({
                  message: '添加成功',
                  type: 'success'
                });
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
    //  删除
      delMoreCage(){
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
              this.$del(this.urls.feecates, {ids: this.delArr})
                .then(() => {
                  this.getExpenseCage();
                  this.$message({
                    message: '删除成功',
                    type: 'success'
                  });
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
      refreshCage(){
        this.loading = true;
        this.getExpenseCage();
        setTimeout(()=>{
          this.loading = false;
        },2000);
      },
      delClick2(row,e){
        this.showDel2 = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
      },
      confirmD2(id){
        this.$del(this.urls.feecates+'/'+id)
          .then(()=>{
            this.showDel2 = false;
            this.getExpenseCage();
            this.$message({
              message: '删除成功',
              type: 'success'
            });
          },err=>{
            if (err.response) {
              this.showDel2 = false;
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
      editCancel2(){
        this.cateIndex = '';
        this.$message({
          message: '取消修改',
          type: 'info'
        });
      },
      editSave2(index,row){
        let newData = {
          id: row.id,
          name: row.name,
          status: row.status
        };
        this.$patch(this.urls.feecates+'/'+row.id,newData)
          .then(()=>{
            this.loading = true;
            this.getExpenseCage();
            this.loading = false;
            this.cateIndex ='';
            this.inputChange = false;
            this.$message({
              message: '修改成功',
              type: 'success'
            });
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
      },
    },
    mounted() {
      this.$store.dispatch('setOpt',this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
      this.getExpenseType();
      this.getExpenseCage();
    }
  }
</script>