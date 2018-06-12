<template>
    <!-- :show-timeout="200"-->
        <el-scrollbar wrapClass="scrollbar-wrapper" :style="mTop">
            <el-menu
                    mode="vertical"
                    :default-active="$route.path"
                    :collapse="isCollapse"
                    background-color="#304156"
                    text-color="#bfcbd9"
                    active-text-color="#409EFF"
            >
                <sidebar-item :routes="routes"></sidebar-item>
            </el-menu>
        </el-scrollbar>
</template>
<script>
    import { mapGetters } from 'vuex'
    import SidebarItem from './SidebarItem.vue'

    export default {
        data(){
            return {
                mTop:{
                    marginTop: '50px'
                }
            }
        },
        components: { SidebarItem },
        computed: {
            ...mapGetters([
                'sidebar'
            ]),
            routes() {
                return this.$router.options.routes
            },
            isCollapse() {
                return !this.sidebar.opened
            }
        }
    }
</script>
<style>
</style>