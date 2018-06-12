<template>
    <div>
        <h2>商品类别管理</h2>
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