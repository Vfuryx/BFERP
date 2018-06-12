<template>
    <div>
        <h2>仓储退货审核</h2>
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
                        cnt: '审核',
                        icon: 'bf-audit'
                    },
                    {
                        cnt: '退审',
                        icon: 'bf-auditfaild'
                    },
                    {
                        cnt: '打印',
                        icon: 'bf-printer'
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