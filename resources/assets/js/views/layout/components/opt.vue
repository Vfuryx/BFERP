<template>
    <div class="opt clearfix">
        <div v-for="item in opts" class="list" @click="item.ent">
               <el-tooltip :content="item.cnt" placement="top" effect="dark">
                   <i class="iconfont optIcon" :class="item.icon">
                       <span>{{item.cnt}}</span>
                   </i>
               </el-tooltip>

           </div>
        <i class="iconfont bf-down dwn-more" v-show="this.$store.state.opt.show" @click="changeShow"></i>
        <div class="hide-list" v-show="this.$store.state.opt.ok">
            <div v-for="item in this.$store.state.opt.lastOpt">
                <i class="iconfont optIcon" :class="item.icon">
                    <span>{{item.cnt}}</span>
                </i>
            </div>
        </div>
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
          changeShow(){
            this.$store.commit('toggle_ok');
          }
        },
        mounted(){

        }

    }
</script>
