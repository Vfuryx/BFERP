<template>
    <div>
        <h1>Hello组件</h1>
        <p>{{msg}}</p>
        <el-button @click="visible = true">按钮</el-button>
        <el-dialog :visible.sync="visible">
            <p>欢迎使用 Element</p>
        </el-dialog>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                visible: false,
                msg: 'hello组件的消息'
            }
        }
    }
</script>