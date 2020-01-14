<template>
    <div tabindex="-1" role="dialog" aria-modal="true" aria-label="提示" class="el-message-box__wrapper" style="z-index:2007;background-color:rgba(0,0,0,0.5);" v-show="isShowMessageBox">
        <div class="el-message-box">
            <div class="el-message-box__header">
                <div class="el-message-box__title">
                    <span>{{title}}</span>
                </div>
                <button type="button" aria-label="Close" class="el-message-box__headerbtn"  @click="cancel">
                    <i class="el-message-box__close el-icon-close"></i>
                </button>
            </div>
            <div class="el-message-box__content">
                <div class="el-message-box__status el-icon-warning"></div>
                <div class="el-message-box__message">
                    <p>{{content}}</p>
                </div>
                <div class="el-message-box__input" style="display: none;">
                    <div class="el-input">
                        <input type="text" autocomplete="off" placeholder="" class="el-input__inner">
                    </div>
                    <div class="el-message-box__errormsg" style="visibility: hidden;"> </div>
                </div>
            </div>
            <div class="el-message-box__btns">
                <button type="button" class="el-button el-button--default el-button--small" v-show="isShowCancelBtn" @click="cancel">
                    <span>{{ cancelBtnText }}</span>
                </button>
                <button type="button" class="el-button el-button--default el-button--small el-button--primary" v-show="isShowConfirmBtn" @click="confirm">
                    <span>{{ confirmBtnText }}</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props: {
      title: {
        type: String,
        default: '标题'
      },
      content: {
        type: String,
        default: '这是弹框内容'
      },
      isShowInput: false,
      inputValue: '',
      isShowCancelBtn: {
        type: Boolean,
        default: true
      },
      isShowConfirmBtn: {
        type: Boolean,
        default: true
      },
      cancelBtnText: {
        type: String,
        default: '取消'
      },
      confirmBtnText: {
        type: String,
        default: '确定'
      }
    },
    data() {
      return {
        isShowMessageBox: false,
        resolve: '',
        reject: '',
        promise: '' // 保存promise对象
      };
    },
    methods: {
      // 确定,将promise断定为resolve状态
      confirm: function () {
        this.isShowMessageBox = false;
        if (this.isShowInput) {
          this.resolve(this.inputValue);
        } else {
          this.resolve('confirm');
        }
        this.remove();
      },
      // 取消,将promise断定为reject状态
      cancel: function () {
        this.isShowMessageBox = false;
        this.reject('cancel');
        this.remove();
      },
      // 弹出messageBox,并创建promise对象
      showMsgBox: function () {
        this.isShowMessageBox = true;
        this.promise = new Promise((resolve, reject) => {
          this.resolve = resolve;
          this.reject = reject;
        });
        // 返回promise对象
        return this.promise;
      },
      remove: function () {
        setTimeout(() => {
          this.destroy();
        }, 300);
      },
      destroy: function () {
        this.$destroy();
        document.body.removeChild(this.$el);
      }
    }
  };
</script>

<style lang="scss" scoped></style>

