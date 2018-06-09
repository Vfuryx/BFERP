<template>
    <div class="opt">
           <span v-for="item in opts" class="list">
               <el-tooltip :content="item.cnt" placement="top" effect="dark">
                   <el-button type="primary" :icon="item.icon"></el-button>
               </el-tooltip>
           </span>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default{
        data(){
            return {
                /*opts:[
                    {
                        cnt:'next',
                        icon:'el-icon-arrow-right'
                    }
                ]*/
            }
        },
        computed:{
            ...mapGetters([
                'opts'
            ])
        },
        methods:{

        },
        mounted(){
            // console.log(this.opts.cnt);
        }

    }
</script>
<style lang="scss" scoped>
    .opt{
        padding: 7px 15px;
        box-sizing:border-box;

        .list{
            margin-right: 5px;
        }


    }
</style>