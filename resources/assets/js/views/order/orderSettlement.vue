<template>
    <div>
        <h2>订单结算</h2>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                newOpt: [
                    {
                        cnt: '修改',
                        icon: 'bf-change'
                    },
                    {
                        cnt: '退审',
                        icon: 'bf-audit'
                    },
                    {
                        cnt: '结算',
                        icon: 'bf-finSettle'
                    },
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