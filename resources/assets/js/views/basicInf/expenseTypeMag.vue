<template>
    <div>
        <!--数据-->
        <el-table
                :data="expenseType" fit highlight-current-row
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
                    width="180">
                <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.fee_category_id" placeholder="输入类型" @change="handleEdit"></el-input>
                        </span>
                    <span v-else>
                            {{scope.row.fee_category_id}}
                        </span>
                </template>
            </el-table-column>
            <el-table-column
                    label="名称"
                    align="center"
                    width="200">
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
                    width="180">
                <template slot-scope="scope">
                    <span v-if="changeIndex=='index'+scope.$index">
                    <el-select v-model="scope.row.is_default" placeholder="状态" @change="handleEdit">
                        <el-option v-for="item in defau" :key="item.value" :label="item.label" :value="item.value"></el-option>
                    </el-select>
                    </span>
                    <span v-else>
                            {{scope.row.is_default==0?'否':'是'}}
                        </span>
                </template>
            </el-table-column>
            <el-table-column
                    label="状态"
                    align="center"
                    width="200">
                <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-select v-model="scope.row.status" placeholder="状态" @change="handleEdit">
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
                    label="备注"
                    align="center">
                <template slot-scope="scope">
                        <span v-if="changeIndex=='index'+scope.$index">
                            <el-input size="small" v-model="scope.row.remark" placeholder="输入备注" @change="handleEdit"></el-input>
                        </span>
                    <span v-else>
                            {{scope.row.remark}}
                        </span>
                </template>
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

        <!--添加-->
        <el-dialog title="新增费用类型" :visible.sync="showAdd">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
                <el-form-item label="费用类别" prop="type">
                    <el-select v-model="ruleForm.type" placeholder="请选择状态">
                        <el-option v-for="item in feeCage" :label="item.name" :value="item.name"></el-option>
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
                <el-form-item label="是否默认
" prop="default">
                    <el-select v-model="ruleForm.default" placeholder="请选择是或否">
                        <el-option label="否" value="0"></el-option>
                        <el-option label="是" value="1"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="类别备注
" prop="mark">
                    <el-input type="textarea" v-model="ruleForm.mark" placehold="请输入标记名称"></el-input>
                </el-form-item>
                <el-form-item label="状态" prop="status">
                    <el-select v-model="ruleForm.status" placeholder="请选择状态">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1" selected></el-option>
                    </el-select>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="submitForm('ruleForm')">添加</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </div>
        </el-dialog>

        <!--分页-->
        <div ref="pagination">
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
          default:'0',
          mark:'',
          status: '1'
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
        defau:[
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
        feeCage:[]
      }
    },
    methods:{
      //修改opt宽度
      changeOptWidth(){
        this.$store.state.opt.opts = this.newOpt;
        this.$store.commit('change', this.newOpt);
      },
      getExpenseType(){
        this.$fetch('/feetypes')
          .then(res=>{
            this.expenseType = res.data;
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
      addExpense(){
        this.showAdd = true;
      },
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            var data = {
              fee_category_id: this.ruleForm.type,
              name: this.ruleForm.name,
              color: this.ruleForm.color,
              code: this.ruleForm.code,
              remark: this.ruleForm.mark,
              is_default: this.ruleForm.default,
              status: this.ruleForm.status
            };
            this.$post('/feetypes', data)
              .then(() => {
                this.$message({
                  message: '添加成功',
                  type: 'success'
                });
                this.showAdd = false;
                this.getExpenseType();
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
        if(this.inputChange){
          this.$patch('/feetypes/'+row.id,newData)
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
        this.$fetch('/feetypes?page=' + val).then((res) => {
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
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(id){
        this.$del('/feetypes/'+id)
          .then(()=>{
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.getExpenseType();
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
            this.$del("/feetypes", {ids: this.delArr})
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
        this.$fetch('/feecates')
          .then(res=>{
            this.feeCage = res.data;
            console.log(this.feeCage);
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
    },
    mounted() {
      this.changeOptWidth();
      const that = this;
      $(window).resize(() => {
        that.changeOptWidth();
      })
      this.getExpenseType();
      this.getExpenseCage();
    }
  }
</script>