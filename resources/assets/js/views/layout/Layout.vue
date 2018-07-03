<template>
    <div class="app-wrapper" :class="classObj">
        <div v-if="device==='mobile'&&sidebar.opened" class="drawer-bg" @click="handleClickOutside"></div>
        <Logo></Logo>
        <sidebar class="sidebar-container"></sidebar>
        <div class="main-container">
            <navbar></navbar>
            <tags-view></tags-view>
            <Opt></Opt>
            <app-main ref="appMain"></app-main>
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
            return this.$store.getters.sidebar
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
            },
        setMinHeight(){
            let navH = $('.navbar').height();
            let tagH = $('.tags-view-container').height();
            let optH = $('.opt').height();
            let mtH = parseInt($('.app-main').css('marginTop'));
            let mbH = parseInt($('.app-main').css('marginBottom'));
            let finalH = $(window).height()-navH-tagH-optH-mtH-mbH ;
            $('.app-main').css({height:finalH+'px'});
          },
      },
      mounted(){
        this.setMinHeight();
        let that = this;
        $(window).resize(()=>{
            that.setMinHeight();
          })
      }
    }
</script>
<style rel="stylesheet/scss" lang="scss" scoped></style>