<template>
    <div>
        <h1>Hello组件</h1>
        <!--<p>{{msg}}</p>-->
        <el-button @click="visible = true">按钮</el-button>
        <el-dialog :visible.sync="visible">
            <p>欢迎使用 Element</p>
        </el-dialog>
        <!--<h1>{{optCnt}}</h1>-->
        <!--<i class="iconfont bf-home"></i>
        <i class="iconfont bf-logout"></i>-->
    </div>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default {
        data(){
            return {
                visible: false,
                msg: 'hello组件的消息'
            }
        },
        computed: {
            ...mapGetters([
                'optCnt',
                'optIcon'
            ])
        },
        mounted(){
            // console.log(this.wH);
        }
    }
</script>