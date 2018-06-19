<template>
    <div>
        <el-table :data="colors" fit highlight-current-row ref="multipleTable" @row-click="handleCurrentChange"  @selection-change="selsChange">
            <el-table-column
                    type="selection"
                    width="95" align="center" :checked="checkboxInit" @change="toggleChecked">
            </el-table-column>
            <el-table-column label="标记代码" align="center">
                <template slot-scope="scope">
                    {{scope.row.markcode}}
                </template>
            </el-table-column>
            <el-table-column label="标记名称" width="180" align="center">
                <template slot-scope="scope">
                    <span>{{scope.row.markname}}</span>
                </template>
            </el-table-column>
            <el-table-column label="颜色" width="180" align="center">
                <template slot-scope="scope">
                    <el-color-picker v-model="scope.row.color"></el-color-picker>
                </template>
            </el-table-column>
            <el-table-column label="描述" width="180" align="center">
                <template slot-scope="scope">
                    {{scope.row.description}}
                </template>
            </el-table-column>
            <el-table-column align="center" label="状态" width="200">
                <template slot-scope="scope">
                    <span>{{scope.row.status===0?'停用':'启用'}}</span>
                </template>
            </el-table-column>
            <el-table-column label="操作" width="180" align="center">
                <template slot-scope="scope">
                    <i class="el-icon-edit" @click="edit(scope.row.id)"></i>
                    <i class="el-icon-delete" @click="del(scope.row.id,$event)" v-model="newId"></i>
                </template>
            </el-table-column>
        </el-table>

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
                        <el-option label="0" value="0"></el-option>
                        <el-option label="1" value="1"></el-option>
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
            ent: this.addNew
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.addNew
          }
        ],
        colors: [],
        multipleTable: [],
        multipleSelection:[],
        checkboxInit: false,
        showMask: false,
        visible2: false,
        dele: '',
        cancelDel:'',
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
          ],
          desc: [
            {required: true, message: '请填写描述', trigger: 'blur'}
          ]
        }
      }
    },
    methods: {
      get: function () {
        this.$http.get('http://bferp.test/api/markcolors').then(function (res) {
          this.colors = res.body.data;
        }, function (err) {
          console.log(err);
        });
      },
      addNew() {
        $('.mask').css({left: $('.logo').width() - 1 + 'px'});
        let leftW = $('.logo').width() * 0.5 + $('.inner').width() * 0.5;
        $('.inner').css({marginLeft: -leftW + 'px'});
        this.showMask = true;
        $('.el-form-item__error').css({left: 50 + 'px'});
      },
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            const url = 'http://bferp.test/api/markcolors';
            this.$http.post(
              url,
              {
                markcode: this.ruleForm.code,
                markname: this.ruleForm.name,
                color: this.ruleForm.color,
                description: this.ruleForm.desc,
                status: this.ruleForm.status
              },
              {emulateJSON: true}
            )
              .then((res) => {
                this.$message({
                  message: '添加成功',
                  type:'success'
                });
                this.showMask = false;
                this.get();
              })
              .catch((err) => {
                if (err.body.status_code === 422) {
                  let arr=err.body.errors;
                  let arr1=[];
                  for (let i in arr) {
                    arr1.push(arr[i]);
                  }
                  let str = arr1.join(',');
                  this.$message.error({
                    message: str
                  });
                }
              });
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
      edit(a){
        console.log(a);
      },
      confirmD(id){
        this.$http.delete('http://bferp.test/api/markcolors/'+id)
          .then((res)=>{
            this.$message({
              message: '删除成功',
              type:'success'
            });
            this.visible2 = false;
            this.get();
          })
          .catch((err)=>{
            this.visible2 = false;
            if(err.body.status_code === 404){
              this.$message.error({
                message: '没有查询到相关数据'
              });
            }
          })
      },
      cancelD(){
        this.visible2 = false;
        this.$message({
          message: '取消删除',
          type:'info'
        });
      },
      del(b,e){
        this.visible2 = true;
        $('.el-popper').css({left:e.x-100+'px',top: e.y-125+'px'});
        this.newId= b;
      },
      toggleChecked(){
        this.checkboxInit = !this.checkboxInit;
      },
      selsChange(sels) {
        this.sels = sels
      },
      handleCurrentChange(row, event, column) {

      }
    },
    create() {

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
      });
      this.get();
    }
  }
</script>
<style lang="scss" scoped>
    .el-table_1_column_7{
        .cell{
            i{
                margin-right: 5px;
                cursor: pointer;
            }
        }
    }
</style>