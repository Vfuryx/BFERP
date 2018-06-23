<template>
    <el-menu class="navbar" mode="horizontal">
        <hamburger class="hamburger-container" :toggleClick="toggleSideBar" :isActive="sidebar.opened"></hamburger>
        <breadcrumb></breadcrumb>
        <div class="right">
            <router-link to="/" title="回到首页"><i class="iconfont bf-home"></i></router-link>
            <span @click="logout" title="退出"><i class="iconfont bf-logout"></i></span>
        </div>
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
        }
    }
</script>
<style rel="stylesheet/scss" lang="scss" scoped></style>