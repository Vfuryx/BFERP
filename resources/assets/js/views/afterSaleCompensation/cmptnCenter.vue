<template>
    <div>
        <h2>赔偿中心</h2>
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