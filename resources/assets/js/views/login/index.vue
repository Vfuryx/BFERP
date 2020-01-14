<template>
    <div class="login-container">
        <el-form class="login-form" autoComplete="on" :model="loginForm" :rules="loginRules" ref="loginForm"
                 label-position="left">
            <h3 class="title">博飞ERP系统</h3>
            <el-form-item prop="username">
        <span class="svg-container svg-container_login">
          <svg-icon icon-class="user"/>
        </span>
                <el-input name="username" type="text" v-model="loginForm.username" autoComplete="on" placeholder="请输入用户名"/>
            </el-form-item>

            <el-form-item prop="password">
        <span class="svg-container">
          <svg-icon icon-class="password"></svg-icon>
        </span>
                <el-input name="password" :type="pwdType" v-model="loginForm.password"
                          placeholder="请输入密码"></el-input>
                <span class="show-pwd" @click="showPwd"><svg-icon icon-class="eye"/></span>
            </el-form-item>
            <el-form-item prop="code">
        <span class="svg-container">
          <i class="iconfont bf-yzm"></i>
        </span>
                <el-input name="yzCode" type="text" v-model="loginForm.code" placeholder="请输入验证码" id="yzCode"></el-input>
                <span class="show-pwd yzc" @click="this.getCode">
           <img :src="src" alt="">
        </span>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" style="width:100%;" :loading="loading" @click="submitForm('loginForm')">
                    登录
                </el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
  import router from '../../router/index.js'
  export default {
    name: 'login',
    data() {
      return {
        loginForm: {
          username: '',
          password: '',
          code: '',
          key: ''
        },
        loginRules: {
          username: [
            {required: true, message: '请输入用户名', trigger: 'blur'}
          ],
          password: [
            {required: true, message: '请输入密码', trigger: 'blur'}
          ],
          code: [
            {required: true, message: '请输入验证码', trigger: 'blur'}
          ],
        },
        loading: false,
        pwdType: 'password',
        src: ''
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
      getCode: function () {
        this.$post('/captchas')
          .then((res) => {
            this.src = res.captcha_image_content;
            this.loginForm.key = res.captcha_key;
            this.loginForm.code = '';
            $('#yzCode').focus();
          })
      },
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            let data =  {
              username: this.loginForm.username,
              password: this.loginForm.password,
              captcha_key: this.loginForm.key,
              captcha_code: this.loginForm.code
            };
            this.$store.dispatch('Login',data).then(() => {
              this.$message({
                message: '登录成功',
                type: 'success'
              });
              this.$store.dispatch('Profile');
              router.push({
                path:"/",
                query:{redirect:router.currentRoute.fullPath}
              })
            }).catch(error => {
              if (error.response) {
                let msg = error.response.data.message;
                this.$message.error({
                  message: msg
                });
                this.getCode();
                this.loginForm.code = '';
              }
            })
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
    },
    mounted() {
      this.getCode();
    }
  }

</script>

<style rel="stylesheet/scss" lang="scss">
    $bg: #2d3a4b;
    $light_gray: #eee;

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
    $bg: #2d3a4b;
    $dark_gray: #889aa4;
    $light_gray: #eee;
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
        .yzc {
            right: 0;
            top: 5px;
        }
    }
</style>
