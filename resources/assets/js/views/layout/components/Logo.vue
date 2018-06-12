<template>
    <el-menu default-active="1-4-1" class="el-menu-vertical-demo logo" ref="logoIcon">
        <el-menu-item index="2"  :class="{'submenu-title-noDropdown':!isNest}">
            <!--<i class="el-icon-menu"></i>-->
            <img src="/img/logo.png" alt="" style="width: 24px">
            <span slot="title" class="title">博飞科技</span>
        </el-menu-item>
    </el-menu>
</template>
<script>
    export default {
        props:{
            isNest: {
                type: Boolean,
                default: false
            }
        }
    }
</script>
<style lang="scss" scoped>
    .el-menu-item{
        padding: 0;
    }

    .el-menu-item:focus, .el-menu-item:hover {
        outline: 0;
        background-color: #001528;
    }

   .logo {
       /*transition: width 0.15s;*/
       margin: 0;
       padding: 0;
       display: inline-block;
       height: 50px;
       width: 201px;
       position: fixed;
       left: 0;
       top: 0;
       line-height: 50px;
       background-color: #304156;

       .logoIcon{

       }

       span{
           font-weight: bold;
           font-size: 16px;
           color: #fff;
       }
   }
</style>