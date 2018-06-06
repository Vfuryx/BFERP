<template>
    <el-menu default-active="1-4-1" class="el-menu-vertical-demo logo" :collapse="isCollapse">
        <el-menu-item index="2"  :class="{'submenu-title-noDropdown':!isNest}">
            <i class="el-icon-menu"></i>
            <span slot="title" class="title">简易生活</span>
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
   .logo {
       margin: 0;
       padding: 0;
       display: inline-block;
       height: 50px;
       width: 180px;
       position: fixed;
       left: 0;
       top: 0;
       text-align: center;
       line-height: 50px;

       span{
           font-weight: bold;
           font-size: 18px;
       }
   }
</style>