<template>
    <el-menu default-active="1-4-1" class="el-menu-vertical-demo logo" ref="logoIcon">
        <!--  :class="{'submenu-title-noDropdown':!isNest}"-->
        <el-menu-item index="2">
            <!--<i class="el-icon-menu"></i>-->
            <img src="/img/logo.png">
            <span slot="title" class="title">博 飞 ERP</span>
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
<style lang="scss" scoped></style>