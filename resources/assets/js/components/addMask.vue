<template>
    <div>
        <el-dialog :title="title" :visible.sync="showMask" @close="closeDialog">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
                <el-form-item v-for="(item,index) in addArr" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                       <el-input v-model="ruleForm[item.prop]" :placehold="item.holder"></el-input>
                    </span>
                    <span v-else-if="item.type=='pickColor'">
                       <el-color-picker v-model="ruleForm[item.prop]"></el-color-picker>
                    </span>
                    <span v-else-if="item.type=='select_stu'">
                        <el-select v-model="ruleForm[item.prop]" :placeholder="item.holder">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1"></el-option>
                    </el-select>
                    </span>
                    <span v-else-if="item.type=='select_def'">
                        <el-select v-model="ruleForm[item.prop]" :placeholder="item.holder">
                        <el-option label="否" value="0"></el-option>
                        <el-option label="是" value="1"></el-option>
                    </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model="ruleForm[item.prop]" :placehode="item.holder"></el-input>
                    </span>
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
    import qs from 'qs'
  export default {
    props: ['title', 'ruleForm', 'rules', 'addArr','submitData','url'],
    data() {
      return {
        newForm:[],
      }
    },
    computed:{
      showMask:{
        get:function(){
          return this.$store.getters.showMask;
        },
        set(){}
      }
    },
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.$store.dispatch('setAddObj',this.ruleForm);
            this.$post(this.url, this.ruleForm)
              .then(() => {
                this.$message({
                  message: '添加成功',
                  type: 'success'
                });
               this.$store.dispatch('setShowAdd',false);
                this.$store.dispatch('getData');
                this.resetForm('ruleForm');
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

      closeDialog(){
        this.$store.dispatch('setShowAdd',false);
      }
    },
    mounted(){
      /*this.$nextTick(function () {
        this.$on('submitForm',this.submitForm)
      })*/
    }
  }
</script>
<style>

</style>