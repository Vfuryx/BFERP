<template>
    <div>
        <h2>财务刷单审核</h2>
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
                        cnt: '删除',
                        icon: 'bf-del'
                    },
                    {
                        cnt: '提交',
                        icon: 'bf-submit'
                    },
                    {
                        cnt: '驳回',
                        icon: 'bf-reject'
                    },
                    {
                        cnt: '审核',
                        icon: 'bf-audit'
                    },
                    {
                        cnt: '退审',
                        icon: 'bf-auditfaild'
                    },
                    {
                        cnt: '发货',
                        icon: 'bf-deliver'
                    },
                    {
                        cnt: '批量处理',
                        icon: 'bf-more'
                    },
                    {
                        cnt: '导出',
                        icon: 'bf-out'
                    },
                    {
                        cnt: '下载',
                        icon: 'bf-dwn'
                    },
                    {
                        cnt: '还原',
                        icon: 'bf-reduce'
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