<template>
    <el-menu class="navbar" mode="horizontal">
        <hamburger class="hamburger-container" :toggleClick="toggleSideBar" :isActive="sidebar.opened"></hamburger>
        <breadcrumb></breadcrumb>
        <div class="right">
            <router-link to="/" title="回到首页"><i class="iconfont bf-home"></i></router-link>
            <span @click="logout" title="退出"><i class="iconfont bf-logout"></i></span>
        </div>
       <!-- <el-dropdown class="avatar-container" trigger="click">
            <div class="avatar-wrapper">
                <img class="user-avatar" :src="avatar+'?imageView2/1/w/80/h/80'">
                <i class="el-icon-caret-bottom"></i>
            </div>

            <el-dropdown-menu class="user-dropdown" slot="dropdown">
                <router-link class="inlineBlock" >
                    <el-dropdown-item>
                        Home
                    </el-dropdown-item>
                </router-link>
                <el-dropdown-item divided>
                    <span @click="logout" style="display:block;">LogOut</span>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>-->
    </el-menu>
</template>
<script>
    import { mapGetters } from 'vuex'
    import Breadcrumb from '../../../components/Breadcrumb/index.vue'
    import Hamburger from '../../../components/Hamburger/index.vue'

    export default {
        components: {
            Breadcrumb,
            Hamburger
        },
        computed: {
            ...mapGetters([
                'sidebar',
                'avatar'
            ])
        },
        methods: {
            toggleSideBar(){
                this.$store.dispatch('ToggleSideBar')
            },
            logout(){
                this.$store.dispatch('LogOut').then(()=>{
                    location.reload()
                })
            }
        }
    }
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
    .navbar {
        height: 50px;
        line-height: 50px;
        border-radius: 0 !important;
        position: relative;

        .hamburger-container {
            line-height: 58px;
            height: 50px;
            float: left;
            padding: 0 10px;
        }
       /* .screenfull {
            position: absolute;
            right: 90px;
            top: 16px;
            color: red;
        }
        .avatar-container {
            height: 50px;
            display: inline-block;
            position: absolute;
            right: 35px;
            .avatar-wrapper {
                cursor: pointer;
                margin-top: 5px;
                position: relative;
                .user-avatar {
                    width: 40px;
                    height: 40px;
                    border-radius: 10px;
                }
                .el-icon-caret-bottom {
                    position: absolute;
                    right: -20px;
                    top: 25px;
                    font-size: 12px;
                }
            }
        }*/

        .right{
            position:absolute;
            right: 5px;
            top: 0;

            i,span{
                font-size:25px;
                cursor: pointer;
                margin-right: 10px;
            }
        }
    }
</style>