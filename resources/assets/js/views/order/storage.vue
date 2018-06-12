<template>
    <div>
        <h2>仓储部</h2>
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
                        icon: 'bf-auditfaild'
                    },
                    {
                        cnt: '返回客审',
                        icon: 'bf-examination'
                    },
                    {
                        cnt: '导出',
                        icon: 'bf-out'
                    },
                    {
                        cnt: '物流单',
                        icon: 'bf-logCode'
                    },
                    {
                        cnt: '发货单',
                        icon: 'bf-bill'
                    },
                    {
                        cnt: '上一条',
                        icon: 'bf-beforeItem'
                    },
                    {
                        cnt: '下一条',
                        icon: 'bf-nextItem'
                    },
                    {
                        cnt: '捡货单',
                        icon: 'bf-secSort'
                    },
                    {
                        cnt: '打印',
                        icon: 'bf-printer'
                    },
                    {
                        cnt: '电子面单',
                        icon: 'bf-salesinvoice'
                    },
                    {
                        cnt: '刷新',
                        icon: 'bf-refresh'
                    },

                ]
            }
        },
        mounted() {
            this.$store.state.opt.opts = this.newOpt;
        }
    }
</script>