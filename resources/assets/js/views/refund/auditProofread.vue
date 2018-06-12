<template>
    <div>
        <h2>审核校对</h2>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                newOpt: [
                    {
                        cnt: '锁定',
                        icon: 'bf-lock'
                    },
                    {
                        cnt: '解锁',
                        icon: 'bf-delock'
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