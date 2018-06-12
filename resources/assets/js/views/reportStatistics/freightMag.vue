<template>
    <div>
        <h2>运费管理报表</h2>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                newOpt: [
                    {
                        cnt: '导出',
                        icon: 'bf-out'
                    },
                    {
                        cnt: '下载',
                        icon: 'bf-dwn'
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