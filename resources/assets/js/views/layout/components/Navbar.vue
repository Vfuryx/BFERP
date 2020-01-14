<template>
    <el-menu class="navbar" mode="horizontal">
        <hamburger class="hamburger-container" :toggleClick="toggleSideBar" :isActive="sidebar.opened"></hamburger>
        <breadcrumb></breadcrumb>
            <el-dropdown class="avatar-container right-menu-item" trigger="hover">
                <div class="avatar-wrapper">
                    <img class="user-avatar" src="/img/avatar.png">
                    <span>{{this.$store.getters.name}}</span>
                </div>
                <el-dropdown-menu slot="dropdown">
                    <router-link to="/">
                        <el-dropdown-item>回到首页</el-dropdown-item>
                    </router-link>
                    <!--<el-dropdown-item divided>-->
                    <el-dropdown-item>
                        <span @click="logout" style="display:block;">退出登录</span>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
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
                'sidebar'
            ])
        },
        methods: {
            toggleSideBar(){
                this.$store.dispatch('ToggleSideBar')
            },
            logout(){
              this.$store.dispatch('Logout')
            }
        },
      mounted(){}
    }
</script>
<style rel="stylesheet/scss" lang="scss" scoped></style>