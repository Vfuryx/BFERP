<template>
    <div class="opt">
           <span v-for="item in opts" class="list">
               <el-tooltip :content="item.cnt" placement="top" effect="dark">
                   <!--<el-button type="primary" :icon="item.icon"></el-button>-->
                   <i class="iconfont optIcon" :class="item.icon"></i>
               </el-tooltip>
           </span>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default{
        data(){
            return {

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

        }

    }
</script>
