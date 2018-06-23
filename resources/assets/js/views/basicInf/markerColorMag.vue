<template>
    <div>
        <div ref="table" >
            <el-table :data="colors" fit highlight-current-row ref="multipleTable" @row-click="handleCurrent"
                      @selection-change="handleSelectionChange"
                      max-height="550" type="index"
                      element-loading-text="拼命加载中"
                      v-loading="loading"
                      element-loading-spinner="el-icon-loading"
                      element-loading-background="rgba(0, 0, 0, 0.8)"
            >
                <el-table-column
                        type="selection"
                        width="95" align="center" :checked="checkboxInit" @change="toggleChecked">
                </el-table-column>
                <el-table-column label="标记代码" align="center">
                    <template slot-scope="scope">
                    <span v-if="showIndex=='index'+scope.$index">
                        <el-input size="small" v-model="scope.row.markcode" placeholder="输入标记" @change="handleEdit(scope.$index,scope.row)"></el-input>
                    </span>
                        <span v-else>
                        {{scope.row.markcode}}
                    </span>
                    </template>
                </el-table-column>
                <el-table-column label="标记名称" width="180" align="center">
                    <template slot-scope="scope">
                    <span v-if="showIndex=='index'+scope.$index">
                        <el-input size="small" v-model="scope.row.markname" placeholder="输入名称" @change="handleEdit(scope.$index,scope.row)"></el-input>
                    </span>
                        <span v-else>{{scope.row.markname}}</span>
                    </template>
                </el-table-column>
                <el-table-column label="颜色" width="180" align="center">
                    <template slot-scope="scope">
                    <span  v-if="showIndex=='index'+scope.$index">
                        <el-color-picker v-model="scope.row.color" @change="handleEdit(scope.$index,scope.row)" size="mini"></el-color-picker>
                    </span>
                        <span v-else>
                        <span class="tableColor" :style="{backgroundColor:scope.row.color}"></span>
                        {{scope.row.color}}
                    </span>
                    </template>
                </el-table-column>
                <el-table-column label="描述" width="180" align="center">
                    <template slot-scope="scope">
                    <span v-if="showIndex=='index'+scope.$index">
                        <el-input   type="textarea" size="small" v-model="scope.row.description" placeholder="输入描述" @change="handleEdit(scope.$index,scope.row)"></el-input>
                    </span>
                        <span v-else>
                        {{scope.row.description}}
                    </span>
                    </template>
                </el-table-column>
                <el-table-column align="center" label="状态" width="200">
                    <template slot-scope="scope">
                    <span v-if="showIndex=='index'+scope.$index">
                         <el-select v-model="scope.row.status" placeholder="状态" @change="handleEdit(scope.$index,scope.row)">
    <el-option v-for="item in status" :key="item.value" :label="item.label" :value="item.value"></el-option>
  </el-select>
                    </span>
                        <span v-else>
                         <i class='showStatus' :class="{'statusActive':scope.row.status==0?false:true}"></i>
                        {{scope.row.status==0?'停用':'启用'}}
                    </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="220" align="center">
                    <template slot-scope="scope">
                    <span v-if="showIndex=='index'+scope.$index">
                          <el-button
                                  size="mini"
                                  @click="editSave(scope.$index,scope.row)">保存
                    </el-button>
                        <el-button
                                size="mini"
                                @click="editCancle()">取消
                    </el-button>
                    </span>
                        <span v-else>
                        <el-button
                                size="mini"
                                @click="edit(scope.$index,scope.row.id,scope.row)">编辑
                    </el-button>
                   </span>
                        <el-button
                                size="mini"
                                type="danger"
                                @click="del(scope.row.id,$event)" v-model="newId">删除
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>

            <!--分页-->
            <div ref="pagination">
                <el-pagination
                        @current-change="handleCurrentChange"
                        :current-page="pagination.current_page"
                        :page-size="pagination.per_page"
                        layout="total, sizes, prev, pager, next, jumper"
                        :total="pagination.total">
                </el-pagination>
            </div>
        </div>

        <!--删除提示-->
        <el-popover
                placement="top"
                width="160"
                v-model="visible2" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(newId)">确定</el-button>
            </div>
        </el-popover>

        <!--添加面板-->
        <el-dialog title="新增颜色标记" :visible.sync="showMask">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
                <el-form-item label="标记代码" prop="code">
                    <el-input v-model="ruleForm.code" placehold=""></el-input>
                </el-form-item>
                <el-form-item label="标记名称" prop="name">
                    <el-input v-model="ruleForm.name" placehold="请输入标记名称"></el-input>
                </el-form-item>
                <el-form-item label="颜色">
                    <el-color-picker v-model="ruleForm.color"></el-color-picker>
                </el-form-item>
                <el-form-item label="状态" prop="state">
                    <el-select v-model="ruleForm.status" placeholder="请选择状态">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="描述" prop="desc">
                    <el-input type="textarea" v-model="ruleForm.desc" placehode="请输入描述"></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="submitForm('ruleForm')">添加</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </div>
        </el-dialog>
    </div>
</template>
<script>
  import axios from 'axios'

  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
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
        colors: [],
        multipleTable: [],
        multipleSelection: [],
        checkboxInit: false,
        showMask: false,
        visible2: false,
        dele: '',
        cancelDel: '',
        newId: '',
        options: [{value: '0', label: 0}, {value: 1, label: 1}],
        ruleForm: {
          code: '',
          name: '',
          color: '',
          status: '',
          desc: ''
        },
        rules: {
          code: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ],
          name: [
            {required: true, message: '请输入标记名称', trigger: 'blur'},
          ],
          status: [
            {required: true, message: '请选择状态', trigger: 'change'}
          ]
        },
        pagination: {
          current_page: 1,
          total: 0,
          per_page: 0
        },
        delArr: [],
        showIndex: '',
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
        inputChange: false,
        loading: true
      }
    },
    /*computed:{
      setTableHeight: function() {
        let tabH = $(window).height() - this.$refs.table.offsetTop - ($(this.$refs.pagination).height()+20);
        return tabH;
      }
    },*/
    methods: {
      //请求数据
      get() {
        this.$fetch('/markcolors').then((res) => {
          this.colors = res.data;
          this.loading = false;
          let pg = res.meta.pagination;
          this.pagination.current_page = pg.current_page;
          this.pagination.total = pg.total;
          this.pagination.per_page = pg.per_page;
        }, (err) => {
          this.$message.error({
            message: err.message
          });
        });
      },
      addNew() {
        $('.mask').css({left: $('.logo').width() - 1 + 'px'});
        let leftW = $('.logo').width() * 0.5 + $('.inner').width() * 0.5;
        $('.inner').css({marginLeft: -leftW + 'px'});
        this.showMask = true;
        $('.el-form-item__error').css({left: 50 + 'px'});
      },
      //添加
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            var data = {
              markcode: this.ruleForm.code,
              markname: this.ruleForm.name,
              color: this.ruleForm.color,
              description: this.ruleForm.desc,
              status: this.ruleForm.status
            };
            this.$post('/markcolors', data)
              .then(() => {
                this.$message({
                  message: '添加成功',
                  type: 'success'
                });
                this.showMask = false;
                this.get();
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
      closeMask() {
        this.showMask = false;
      },
      //选中当前行
      handleCurrent(row, event, column) {},
      //点击删除按钮
      del(id, e) {
        this.visible2 = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.newId = id;
      },
      //执行删除
      confirmD(id) {
        this.$del('/markcolors/' + id)
          .then(() => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.visible2 = false;
            this.get();
          }, err => {
            this.visible2 = false;
            if (err.body.status_code === 404) {
              this.$message.error({
                message: '没有查询到相关数据'
              });
            }
          })
      },
      cancelD() {
        this.visible2 = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      toggleChecked() {
        this.checkboxInit = !this.checkboxInit;
      },
      handleSelectionChange(val) {
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      //每页显示条数
      /*handleSizeChange(val) {
        // console.log(`每页 ${val} 条`);
      },*/
      //分页请求
      handleCurrentChange(val) {
        // console.log(`当前页: ${val}`);
        this.$fetch('/markcolors?page=' + val).then((res) => {
          this.colors = res.data;
          let pg = res.meta.pagination;
          this.pagination.current_page = pg.current_page;
        }, (err) => {
          this.$message.error({
            message: err.message
          });
        });
      },
      //批量删除
      delMore() {
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
            axios.delete("/markcolors", {data: this.$qs.stringify({ids: this.delArr})})
              .then(res => {
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
                this.get();
              })
              .catch(err => {
                this.$message.error({
                  message: '删除失败'
                });
              })
          }).catch(() => {
            this.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      },
      //刷新
      refresh() {
        this.loading = true;
        this.get();
        setTimeout(()=> {
          this.loading = false;
        }, 2000)
      },
      //设置opt宽度
      setOptWidth() {
        this.$store.state.opt.opts = this.newOpt;
        this.$store.commit('change', this.newOpt);
      },
      //编辑
      edit(index) {
        this.showIndex = 'index'+index;
      },
      handleEdit(){
        this.inputChange = true;
      },
      //保存修改
      editSave(index,row){
        let newInfo = {
          id: row.id,
          markcode: row.markcode,
          markname: row.markname,
          color: row.color,
          description: row.description,
          status: row.status
        };
        if(this.inputChange){
          this.$patch('/markcolors/'+row.id,newInfo)
            .then(res=>{
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.showIndex ='';
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
      //取消修改
      editCancle(){
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.showIndex ='';
      }
    },
    mounted() {
      /*
     this.$store.state.opt.opts = this.newOpt;
      this.$store.commit('change', this.newOpt);
      const that = this;
      $(window).resize(
        () => {
        return (() => {
          that.$store.state.opt.opts = that.newOpt;
          that.$store.commit('change', that.newOpt);
        })()}
        );
        */
      this.setOptWidth();
      let that = this;
      $(window).resize(() => {
        that.setOptWidth();
      });
      this.get();
      this.edit();
    }
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