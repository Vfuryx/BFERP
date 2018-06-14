<template>
    <div>
        <el-table :data="colors" border fit highlight-current-row ref="multipleTable">
            <el-table-column
                    type="selection"
                    width="95" align="center">
            </el-table-column>
            <!--<el-table-column align="center" label='ID' width="95">
                <template slot-scope="scope">
                    {{scope.row.id}}
                </template>
            </el-table-column>-->
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
            <el-table-column align="center" label="状态：0=停用，1=启用" width="200">
                <template slot-scope="scope">
                    <span>{{scope.row.status}}</span>
                </template>
            </el-table-column>
        </el-table>


        <div class="mask" v-show="showMask">
            <!--<div class="inner">
                <h2>编辑标记颜色</h2>
                <label>
                   <span>标记代码</span>
                    <el-input v-model="code" placeholder="标记代码"></el-input>
                </label>
                <label>
                    <span>标记名称</span>
                    <el-input v-model="name" placeholder="标记名称"></el-input>
                </label>
                <label>
                    <span>颜色</span>
                    <el-input v-model="mColor" placeholder="请输入内容"></el-input>
                </label>
                <label>
                    <span>描述</span>
                    <el-input
                            type="textarea"
                            :rows="2"
                            placeholder="描述"
                            v-model="textarea">
                    </el-input>
                </label>
                <label>
                    <span>状态</span>
                    <el-select v-model="value" placeholder="请选择">
                        <el-option
                                v-for="item in options"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                        </el-option>
                    </el-select>
                </label>

            </div>-->
           <div class="inner">
               <h2>新增颜色标记</h2>
               <i class="iconfont bf-close close" @click="closeMask"></i>
               <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
                   <el-form-item label="标记代码" prop="code">
                       <el-input v-model="ruleForm.code"></el-input>
                   </el-form-item>
                   <el-form-item label="标记名称" prop="name">
                       <el-input v-model="ruleForm.name"></el-input>
                   </el-form-item>
                   <el-form-item label="颜色" >
                       <!--<el-input>-->
                           <el-color-picker v-model="ruleForm.color"></el-color-picker>
                       <!--</el-input>-->
                   </el-form-item>
                   <el-form-item label="状态" prop="state">
                       <el-select v-model="ruleForm.status" placeholder="请选择状态">
                           <el-option label="0" value="0"></el-option>
                           <el-option label="1" value="1"></el-option>
                       </el-select>
                   </el-form-item>
                   <el-form-item label="描述" prop="desc">
                       <el-input type="textarea" v-model="ruleForm.desc"></el-input>
                   </el-form-item>
                   <el-form-item>
                       <el-button type="primary" @click="submitForm('ruleForm')">添加</el-button>
                       <el-button @click="resetForm('ruleForm')">重置</el-button>
                   </el-form-item>
               </el-form>
           </div>
        </div>
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
            cnt: '修改',
            icon: 'bf-change',
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
        showMask: false,
        value:'',
        code:'',
        mColor:'',
        textarea: '',

        options:[{value:'0',label:0},{value:1,label:1}],

        ruleForm: {
          code: '2',
          name:'2',
          color: 'yellow',
          status: '2',
          desc: '2'
        },
        rules: {
          code: [
            { required: true, message: '请输入标记代码', trigger: 'blur' },
          ],
          name: [
            { required: true, message: '请输入标记名称', trigger: 'blur' },
          ],
          /*color: [
            { required: true, message: '请输入标记名称', trigger: 'blur' },
          ],*/
          status: [
            { required: true, message: '请选择状态', trigger: 'change' }
          ],
          desc: [
            { required: true, message: '请填写描述', trigger: 'blur' }
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
        $('.el-form-item__error').css({left: 50+'px'});
       /* this.$http.post(
          'http://bferp.test/api/markcolors',
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
            alert('success');
          })
          .catch((err) => {
            console.log(err);
          });*/


      },

      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            const url='http://bferp.test/api/markcolors';
            this.$http.post(
              url,
              {
                markcode: this.ruleForm.code,
                markname: this.ruleForm.name,
                color: this.ruleForm.color,
                description: this.ruleForm.desc,
                status: this.ruleForm.status
              },
              {emulateJSON: false}
            )
              .then((res) => {
                console.log(res);
                alert('添加成功');
              })
              .catch((err) => {
                console.log(err);
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

      closeMask(){
        $('.close').parents('.mask').hide();
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
    .mask{
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        background-color: #cccccc;
        z-index: 100;

        h2{
            color: #444;
        }

        .inner{
            background-color: #fff;
            text-align: center;
            border-radius: 10px;
            width: 600px;
            height: 500px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-top: -250px;

            .el-input.el-input--medium,.el-textarea,.el-select{
                width: 92%;
                margin-left: -35px !important;
            }

            .close{
                cursor: pointer;
                position: absolute;
                right: 20px;
                top: 20px;
            }
        }
    }
</style>