<template>
    <div class="optOuter">
        <div class="opt clearfix">
            <div v-for="(item,index) in opts" class="list" @click="addActive(index)" :class="{active:index==current}">
                <el-tooltip :content="item.cnt" placement="top" effect="dark">
                       <i class="iconfont optIcon" :class="item.nClick?'bf-forbid':item.icon" @click="item.ent" >
                        <span class="text">{{item.cnt}}</span>
                    </i>
                </el-tooltip>
            </div>
            <i class="iconfont bf-down dwn-more" v-show="this.$store.state.opt.show" @click="changeShow"></i>
            <div class="hide-list" v-show="this.$store.state.opt.ok">
                <div v-for="item in this.$store.state.opt.lastOpt" @click="item.ent">
                    <i class="iconfont optIcon" :class="item.icon">
                        <span>{{item.cnt}}</span>
                    </i>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import { mapGetters } from 'vuex'
  export default{
    data(){
        return {
          current:'',
        }
    },
    computed:{
        ...mapGetters([
            'opts'
        ])
    },
    methods:{
      changeShow(){
        this.$store.dispatch('toggle_show');
      },

      addActive(index){
        this.current = index;
      }
    },
    mounted(){}
    }
</script>
<style lang="scss" scoped>
    .disabled {
        pointer-events: none;
        cursor: default;
        opacity: 0.6;
    }
</style>
