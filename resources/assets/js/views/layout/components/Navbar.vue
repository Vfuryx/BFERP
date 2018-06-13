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
<style rel="stylesheet/scss" lang="scss" scoped></style>