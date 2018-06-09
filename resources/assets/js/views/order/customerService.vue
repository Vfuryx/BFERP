<template>
    <div>
        <h2>customerService客服部</h2>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default{
        data(){
            return {
                opts:[
                    {
                        cnt:'before',
                        icon:'el-icon-arrow-left'
                    }
                ]
            }
        },
        /*computed:{
            ...mapGetters([
                'opts'
            ])
        },*/
        methods:{
            function(){
               // $store.commit()
               //  this.$store.
            }
        },
        mounted(){
            // store.commit(GET_OPT);
            // console.log(this.$store);
        }
    }
</script>