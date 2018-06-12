<template>
    <div>
        <h2>Intentional customers意向客户</h2>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                newOpt:[
                    {
                        cnt: '新增',
                        icon: 'bf-add'
                    },
                    {
                        cnt: '修改',
                        icon: 'bf-change'
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
                        cnt: '导出',
                        icon: 'bf-out'
                    },
                    {
                        cnt: '作废',
                        icon: 'bf-void'
                    },
                    {
                        cnt: '刷新',
                        icon: 'bf-refresh'
                    }

                ]
            }
        },
        mounted(){
            this.$store.state.opt.opts = this.newOpt;
        }
    }
</script>