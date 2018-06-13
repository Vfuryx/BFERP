<template>
    <div class="app-wrapper" :class="classObj">
        <div v-if="device==='mobile'&&sidebar.opened" class="drawer-bg" @click="handleClickOutside"></div>
        <Logo></Logo>
        <sidebar class="sidebar-container"></sidebar>
        <div class="main-container">
            <navbar></navbar>
            <tags-view></tags-view>
            <Opt></Opt>
            <app-main></app-main>
        </div>
    </div>
</template>
<script>
    import { Navbar, Sidebar, AppMain, TagsView, Logo, Opt} from './components/index.js';
    import ResizeMixin from './minxi/ResizeHandler.js';
    export default {
        name: 'layout',
        components: {
            Navbar,
            Sidebar,
            AppMain,
            TagsView,
            Logo,
            Opt
        },
        mixins: [ResizeMixin],
        computed: {
            sidebar() {
                return this.$store.state.app.sidebar
            },
            device() {
                return this.$store.state.app.device
            },
            classObj() {
                return {
                    hideSidebar: !this.sidebar.opened,
                    withoutAnimation: this.sidebar.withoutAnimation,
                    mobile: this.device === 'mobile'
                }
            }
        },
        methods: {
            handleClickOutside() {
                this.$store.dispatch('CloseSideBar', { withoutAnimation: false })
            }
        }
    }
</script>
<style rel="stylesheet/scss" lang="scss" scoped></style>