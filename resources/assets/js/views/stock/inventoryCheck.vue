<template>
    <div>
        <h2>库存盘点</h2>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                newOpt: [
                    {
                        cnt: '新增',
                        icon: 'bf-add'
                    },
                    {
                        cnt: '修改',
                        icon: 'bf-change'
                    },
                    {
                        cnt: '删除',
                        icon: 'bf-del'
                    },
                    {
                        cnt: '导入',
                        icon: 'bf-in'
                    },
                    {
                        cnt: '导出',
                        icon: 'bf-out'
                    },
                    {
                        cnt: '合并',
                        icon: 'bf-merge'
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