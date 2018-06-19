<template>
  <div class="login-container">
    <el-form class="login-form" autoComplete="on" :model="loginForm" :rules="loginRules" ref="loginForm" label-position="left">
      <h3 class="title">博飞ERP系统</h3>
      <el-form-item prop="username">
        <span class="svg-container svg-container_login">
          <svg-icon icon-class="user" />
        </span>
        <el-input name="username" type="text" v-model="loginForm.username" autoComplete="on" placeholder="username" />
      </el-form-item>

      <el-form-item prop="password">
        <span class="svg-container">
          <svg-icon icon-class="password"></svg-icon>
        </span>
        <el-input name="password" :type="pwdType" v-model="loginForm.password" placeholder="password"></el-input>
          <span class="show-pwd" @click="showPwd"><svg-icon icon-class="eye" /></span>
      </el-form-item>

      <el-form-item prop="code">
        <span class="svg-container">
          <i class="iconfont bf-yzm"></i>
        </span>
        <el-input name="yzCode" type="text" v-model="loginForm.code" placeholder="code"></el-input>
        <span class="show-pwd yzc" @click="this.getyzCode">
           <img :src="src" alt="">
        </span>
      </el-form-item>
      <el-form-item>
        <!--@click.native.prevent="handleLogin"-->
        <el-button type="primary" style="width:100%;" :loading="loading" @click="submitForm('loginForm')">
          登录
        </el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
// import { isvalidUsername } from '../../utils/validate.js';

export default {
  name: 'login',
  data() {
   /* const validateUsername = (rule, value, callback) => {
      //  用户名输入有误
      if (!isvalidUsername(value)) {
        callback(new Error('请输入正确的用户名'))
      } else {
        callback()
      }
    }
    const validatePass = (rule, value, callback) => {
      if (value.length < 5) {
        callback(new Error('密码不能小于5位'))
      } else {
        callback()
      }
    }*/
    return {
      loginForm: {
        username: '',
        password: '',
        code: '',
        key: ''
      },
      loginRules: {
        username: [
          { required: true, message: '请输入用户名',trigger: 'blur'}
          ],
        password: [
          { required: true, message: '请输入密码',trigger: 'blur'}
          ],
        code: [
          { required: true, message: '请输入验证码',trigger: 'blur'}
          ],
    },
      loading: false,
      pwdType: 'password',
      src:''
    }
  },
  methods: {
    //  显示密码
    showPwd() {
      if (this.pwdType === 'password') {
        this.pwdType = ''
      } else {
        this.pwdType = 'password'
      }
    },
    //  登录跳转
 /*   handleLogin() {
      this.$refs.loginForm.validate(valid => {
        if (valid) {
          this.$router.push({ path: '/' });
          // this.loading = true;
         /!* this.$store.dispatch('Login', this.loginForm).then(() => {
            this.loading = false
            //  跳转到根路径
            this.$router.push({ path: '/' })
          }).catch(() => {
            this.loading = false
          })*!/
        }
        else {
          console.log('error submit!!');
          return false
        }
      })
    },*/
    getyzCode: function () {
      /*this.$request.post('/captchas',
      function(res){
        this.src= res.body.captcha_image_content;
        this.loginForm.key = res.body.captcha_key;
      });*/
      this.$http.post('http://bferp.test/api/captchas', {emulateJSON: true}).then(function (res) {
        this.src= res.body.captcha_image_content;
        this.loginForm.key = res.body.captcha_key;
      }, function (err) {
        // console.log(err);
      });
    },
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          const url = 'http://bferp.test/api/authorizations';
          this.$http.post(
            url,
            {
              username: this.loginForm.username,
              password: this.loginForm.password,
              captcha_key: this.loginForm.key,
              captcha_code: this.loginForm.code
            },
            {emulateJSON: true}
          )
            .then((res) => {
              console.log(res);
               this.$message({
                 message: '登录成功',
                 type:'success'
               });
              this.$router.push({ path: '/' })
            })
            .catch((err) => {
              console.log(err);
              if (err.body.status_code !== 201) {
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
  },
  mounted(){
    this.getyzCode();
    /*this.$request.post('http://bferp.test/api/captchas',
      function(res){
        console.log(res);
        this.src= res.body.captcha_image_content;
        this.loginForm.key = res.body.captcha_key;
      });*/
  }
}

</script>

<style rel="stylesheet/scss" lang="scss">
$bg:#2d3a4b;
$light_gray:#eee;

/* reset element-ui css */
.login-container {
  .el-input {
    display: inline-block;
    height: 47px;
    width: 85%;
    input {
      background: transparent;
      border: 0px;
      -webkit-appearance: none;
      border-radius: 0px;
      padding: 12px 5px 12px 15px;
      color: $light_gray;
      height: 47px;
      &:-webkit-autofill {
        -webkit-box-shadow: 0 0 0px 1000px $bg inset !important;
        -webkit-text-fill-color: #fff !important;
      }
    }
  }
  .el-form-item {
    border: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    color: #454545;
  }
}

</style>

<style rel="stylesheet/scss" lang="scss" scoped>
$bg:#2d3a4b;
$dark_gray:#889aa4;
$light_gray:#eee;
.login-container {
  position: fixed;
  height: 100%;
  width: 100%;
  background-color: $bg;
  .login-form {
    position: absolute;
    left: 0;
    right: 0;
    width: 520px;
    padding: 35px 35px 15px 35px;
    margin: 120px auto;
  }
  .tips {
    font-size: 14px;
    color: #fff;
    margin-bottom: 10px;
    span {
      &:first-of-type {
        margin-right: 16px;
      }
    }
  }
  .svg-container {
    padding: 6px 5px 6px 15px;
    color: $dark_gray;
    vertical-align: middle;
    width: 30px;
    display: inline-block;
    &_login {
      font-size: 20px;
    }
  }
  .title {
    font-size: 26px;
    font-weight: 400;
    color: $light_gray;
    margin: 0px auto 40px auto;
    text-align: center;
    font-weight: bold;
  }
  .show-pwd {
    position: absolute;
    right: 10px;
    top: 7px;
    font-size: 16px;
    color: $dark_gray;
    cursor: pointer;
    user-select: none;
  }
  .yzc{
    right: 0;
    top: 5px;
  }
}
</style>
