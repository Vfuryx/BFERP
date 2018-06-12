<template>
    <div>
        <h2>角色用户关联</h2>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                newOpt: [
                    {
                        cnt: '角色权限',
                        icon: 'bf-jurisdiction'
                    },
                    {
                        cnt: '角色用户',
                        icon: 'bf-juruser'
                    },
                    {
                        cnt: '刷新',
                        icon: 'bf-refresh'
                    }
                ]
            }
        },
        mounted() {
            this.$store.state.opt.opts = this.newOpt;
        }
    }
</script>