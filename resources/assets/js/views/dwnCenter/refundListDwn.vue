<template>
    <div>
        <h2>退款单下载</h2>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                newOpt:[
                    {
                        cnt: '导出',
                        icon: 'bf-out'
                    },
                    {
                        cnt: '下载',
                        icon: 'bf-dwn'
                    }
                ]
            }
        },
        mounted(){
            this.$store.state.opt.opts = this.newOpt;
        }
    }
</script>